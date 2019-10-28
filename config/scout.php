<?php

return [


    'driver' => env('SCOUT_DRIVER', 'algolia'),

   

    'prefix' => env('SCOUT_PREFIX', ''),



    'queue' => true,


    'algolia' => [
        'id' => env('ALGOLIA_APP_ID', ''),
        'secret' => env('ALGOLIA_SECRET', ''),
    ],

];
