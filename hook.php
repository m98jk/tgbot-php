<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';
include "./config.php";

// $bot_api_key  = 'token';
// $bot_username = 'bot_username';
$commands_paths = [
    __DIR__ . '/Commands',
];
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);
    // 
    $telegram->useGetUpdatesWithoutDatabase();

    $telegram->handleGetUpdates();
    // Add this line inside the try{}
    $telegram->addCommandsPaths($commands_paths);
    // Handle telegram webhook request
    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Silence is golden!
    // log telegram errors
    // echo $e->getMessage();
}
