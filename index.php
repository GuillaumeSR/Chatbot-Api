<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\User;

new Router([
  'user/:id' => 'User',
  'message/:id' => 'Message'
]);
