<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class StartCommand extends UserCommand
{
    protected $name = 'start';                      // Your command's name
    protected $description = 'Start command'; // Your command description
    protected $usage = '/start';                    // Usage of your command
    protected $version = '1.0.0';                  // Version of your command

    public function execute(): \Longman\TelegramBot\Entities\ServerResponse
    {
        $message = $this->getMessage();            // Get Message object

        $chat_id = $message->getChat()->getId();   // Get the current Chat ID

        $data = [                                  // Set up the new message data
            'chat_id' => $chat_id,                 // Set Chat ID to send the message to
            'text'    => 'go go go GO...', // Set message to send
        ];

        return Request::sendMessage($data);        // Send message!
    }
}
