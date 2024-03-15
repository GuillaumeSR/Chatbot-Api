<?php

namespace App;

class Router{
  protected array $routes;
  protected string $url;

  public function __construct(array $routes) {
    $this->routes = $routes;
    $this->url = $_SERVER['REQUEST_URI'];
    $this->run();
  }

  protected function run() {
    echo 'jyfu';
  }
}
