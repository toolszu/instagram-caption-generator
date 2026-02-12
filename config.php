<?php
// ==========================================================
// CONFIGURATION FILE
// ==========================================================

// 1. Rename this file to config.php if it is named config.example.php
// 2. Add your API keys below.

// OpenRouter API Keys (Supports Key Rotation)
// You can add multiple keys here to distribute load.
define('OPENROUTER_API_KEYS', [
    'sk-or-v1-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', // Primary Key
    // 'sk-or-v1-yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', // Backup Key 1
]);

// OpenAI Fallback Key (Optional)
// If OpenRouter fails, the system will try this key.
define('OPENAI_API_KEY', ''); 

// AI Model Settings
define('PRIMARY_MODEL', 'openrouter/auto'); // Uses best available free/paid model
define('SECONDARY_MODEL', 'gpt-3.5-turbo');

// App Settings
define('APP_NAME', 'Instagram Caption Generator');
define('APP_VERSION', '1.0.0');
?>
