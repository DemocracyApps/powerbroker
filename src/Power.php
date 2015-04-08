<?php namespace DemocracyApps\PowerBroker;

/*
* This file is part of the DemocracyApps\powers package.
*
* Copyright 2015 DemocracyApps, Inc.
*
* See the LICENSE.txt file distributed with this source code for full copyright and license information.
*
*/

class Power extends \Eloquent {
    protected $table = "da_powers";


    /**
     * @param $groupId
     * @throws \Exception
     */
    public function changeGroup($groupId)
    {
        $group = PowerGroup::find($groupId);
        if ($group == null) throw new \Exception("Unknown power group ID " . $groupId);
        $this->group = $groupId;
        $this->save();
    }
}