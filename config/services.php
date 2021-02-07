<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id'     => '4943123705728129',
        'client_secret' => '5fce03fdc507a17a2770166b933898a2',
        'redirect'      => 'https://multivisionco.com/public/auth/facebook/callback',
    ],


    'google' => [
        'client_id'     => '624726085502-hqsbae0l7vgkq58s4loq18s1qj2lfgdm.apps.googleusercontent.com',
        'client_secret' => 'k9DILqBr7mCx2S_ulCcPfvrg',
        'redirect'      => 'https://iopticsstore.com/public/auth/google/callback',
    ],

];
