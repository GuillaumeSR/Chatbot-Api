<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\Messages;
use App\Controllers\User;

new Router([
  'user/:id' => User::class,
  'messages' => Messages::class
]);
