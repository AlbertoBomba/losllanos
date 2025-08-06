<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Spam Detection Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration settings for the automatic spam detection system.
    |
    */

    // Score thresholds for different actions
    'thresholds' => [
        'block' => 20,      // Auto-block comments with score >= 20
        'spam' => 10,       // Mark as spam comments with score >= 10
        'review' => 5,      // Require manual review for score >= 5
        'approve' => 0,     // Auto-approve comments with score < 5
    ],

    // Enable/disable automatic spam detection
    'enabled' => env('SPAM_DETECTION_ENABLED', true),

    // Enable automatic blocking (set to false to only flag as spam)
    'auto_block' => env('SPAM_AUTO_BLOCK', false),

    // Custom spam keywords (will be merged with default list)
    'custom_keywords' => [
        // Add your custom spam keywords here
        'oferta especial',
        'gana dinero',
        'sin costo',
        'totalmente gratis',
    ],

    // Trusted domains (emails from these domains get lower spam scores)
    'trusted_domains' => [
        'gmail.com',
        'hotmail.com',
        'yahoo.com',
        'outlook.com',
    ],

    // Suspicious domains (emails from these domains get higher spam scores)
    'suspicious_domains' => [
        'tempmail.org',
        '10minutemail.com',
        'guerrillamail.com',
        'mailinator.com',
        'yopmail.com',
        'temp-mail.org',
    ],

    // Maximum comments per IP per day (0 = unlimited)
    'max_comments_per_ip_per_day' => env('SPAM_MAX_COMMENTS_PER_DAY', 20),

    // Cache settings
    'cache' => [
        'blacklist_duration' => 30, // days
        'whitelist_duration' => 7,  // days
    ],

    // External API settings (for future integration)
    'apis' => [
        'akismet' => [
            'enabled' => env('AKISMET_ENABLED', false),
            'key' => env('AKISMET_API_KEY', ''),
            'site_url' => env('APP_URL', ''),
        ],
        
        'abuseipdb' => [
            'enabled' => env('ABUSEIPDB_ENABLED', false),
            'key' => env('ABUSEIPDB_API_KEY', ''),
        ],
    ],

    // Logging
    'log_spam_attempts' => env('SPAM_LOG_ATTEMPTS', true),
    'log_false_positives' => env('SPAM_LOG_FALSE_POSITIVES', true),
];
