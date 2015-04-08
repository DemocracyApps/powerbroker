<?php namespace DemocracyApps\PowerBroker;

/*
* This file is part of the DemocracyApps\powers package.
*
* Copyright 2015 DemocracyApps, Inc.
*
* See the LICENSE.txt file distributed with this source code for full copyright and license information.
*
*/

class PowerBroker {
    private $groups = [];

    /**
     * @param string $name
     * @param int $groupId
     * @return Power
     * @throws \Exception
     */
    public function createNewPower($name, $groupId)
    {
        if ($name == null || sizeof($name) < 1) throw new \Exception("Invalid power name - null or zero-length");
        // Test that the name is unique
        $power = Power::where('name','=',$name)->first();
        if ($power != null) throw new \Exception("A power with the name " . $name . " already exists.");
        $group = PowerGroup::find($groupId);
        if ($group == null) throw new \Exception("Unknown power group ID " . $groupId);
        $power = new Power();
        $power->name = $name;
        $power->group = $groupId;
        $power->save();
        return $power;
    }

    public function groupHasPowerByName ($groupId, $powerName)
    {
        $power = Power::where('name','=',$powerName)->first();
        if ($power == null) throw new \Exception("Unknown power name " . $powerName);
        return $this->groupHasPower($groupId, $power);
    }

    public function groupHasPower ($groupId, $power)
    {
        $hasPower = false;
        if (array_key_exists($groupId, $this->groups) &&
            array_key_exists($power->id, $this->groups[$groupId])) {
                return $this->groups[$groupId][$power->id];
        }

        if ($power->group == $groupId) {
            $hasPower = true;
        }
        else {
            $group = PowerGroup::find($groupId);
            if ($group == null) throw new \Exception("Unknown power group ID " . $groupId);
            if ($group->group != null) {
                $hasPower = $this->groupHasPower($group->group, $power);
            }
        }
        if (! array_key_exists($groupId, $this->groups)) $this->groups[$groupId] = [];
        $this->groups[$groupId][$power->id] = $hasPower;

        return $hasPower;
    }

    public function groupSetHasPowerByName ($groupIds, $powerName)
    {
        $power = Power::where('name', '=', $powerName)->first();
        if ($power == null) throw new \Exception("Unknown power name " . $powerName);
        return $this->groupSetHasPower($groupIds, $power);
    }

    public function groupSetHasPower($groupIds, $power)
    {
        $hasPower = false;
        foreach ($groupIds as $groupId) {
            $hasPower = $this->groupHasPower($groupId);
            if ($hasPower) break;
        }
        return $hasPower;
    }
}