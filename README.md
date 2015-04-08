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

Next, publish the configuration file by running

    php artisan vendor:publish

and edit 'config/domain-context.php'. There are currently four configuration settings in use in the package.
