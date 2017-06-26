<?php

return [
    'mode' => 'sandbox',        // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username' => 'harinder_personal3_api1.techo13.com',       // Api Username
        'password' => 'YCR6GFUSX9RR468D',       // Api Password
        'secret' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AmK3cOCjjJz6KdYlHVigp.FRFA6N',         // This refers to api signature
        'certificate' => '',    // Link to paypals cert file, storage_path('cert_key_pem.txt')
    ],
    'live' => [
        'username' => '',       // Api Username
        'password' => '',       // Api Password
        'secret' => '',         // This refers to api signature
        'certificate' => '',    // Link to paypals cert file, storage_path('cert_key_pem.txt')
    ],
    'payment_action' => 'Sale', // Can Only Be 'Sale', 'Authorization', 'Order'
    'currency' => 'USD',
    'notify_url' => '',         // Change this accordingly for your application.
];