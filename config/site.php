<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Site Contact Configuration
    |--------------------------------------------------------------------------
    |
    | Centralizes the WhatsApp number and contact email so they're set once
    | (here / .env) instead of hardcoded in the footer, contact page, and
    | package/blog detail CTAs. Values below are placeholders — replace via
    | .env before launch.
    |
    */

    'whatsapp_number' => env('SITE_WHATSAPP_NUMBER', '6281234567890'),

    'email' => env('SITE_EMAIL', 'info@garudaprayatour.com'),

    'phone_display' => env('SITE_PHONE_DISPLAY', '+62 812-3456-7890'),

    'address' => env('SITE_ADDRESS', 'Jl. Raya Banyuwangi No. 45, Banyuwangi, Jawa Timur'),
];
