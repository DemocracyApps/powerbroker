# powers
This is a simple Laravel utility to facilitate managing capabilities of users or organizations based on 
the tier or group to which they belong.

## Instructions for Use

### Installation

Begin by installing this package through Composer.


```json
{
    "require": {
        "democracyapps/powerbroker": "dev-master"
    }
}
```

Add the service provider to app.php


```php
// app/config/app.php

'providers' => [
    '...',
    'DemocracyApps\PowerBroker\PowerBrokerServiceProvider',
];
```
For convenience, you may also add the Facade to app.php

```php
'aliases' => [
    '...',
    'PowerBroker' => 'DemocracyApps\PowerBroker\PowerBrokerFacade',
    ];
```

### Configuration Parameters

Next, publish the migrations by running

    php artisan vendor:publish

This will create two migrations, one for power groups (table 'da_power_groups') and one for powers (table 'da_powers').

