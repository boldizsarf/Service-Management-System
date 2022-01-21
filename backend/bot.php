<?php

require "backend/botman/BotMan.php";
require "backend/botman/BotManFactory.php";
require "backend/botman/Drivers/";

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

$config = [
    "facebook" => [
        "token" => "EAAJ0CKJMgrYBAGp7OmOhAAtfdXDbiuMof870kWjWAqo84cfZAt0MzUZA8ZAjmlaTZC2XGJbIYOGvbVhTBdZBLhLMbLLzZAcbkXDZBNrNq73D0fzPU4Y1DsTTY3YwLwbAQYqMkhhyvWP41CMpPsbTE5s5ys92NLYZBH52eDk8gCzq6MOxEcpgpWwgEP6OeHlPCiAZD"
     ]
];

// Load the driver(s) you want to use
DriverManager::loadDriver(BotMan\BotMan\Drivers\Facebook\FacebookDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

// Give the bot something to listen for.
$botman->hears('hello', function (BotMan $bot) {
    $bot->reply('Hello yourself.');
});

// Start listening
$botman->listen();