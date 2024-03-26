<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\Message;
use App\Controllers\User;

new Router([
  'user/:id' => User::class,
  'message' => Message::class
]);
