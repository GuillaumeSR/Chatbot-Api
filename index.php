<?php

require 'vendor/autoload.php';

use App\Router;

new Router([
  'user/:id' => 'User',
  'message/:id' => 'Message'
]);
