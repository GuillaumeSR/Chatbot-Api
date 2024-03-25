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

  protected function extractParams(string $url, string $rule) {
    (array) $params = [];
    (array) $urlParts = explode('/', trim($url, '/'));
    (array) $ruleParts = explode('/', trim($rule, '/'));

    foreach($ruleParts as $index => $rulePart) {
      if (strpos($rulePart, ':') === 0 && isset($urlParts[$index])) {
        $paramName = substr($rulePart, 1);
        $params[$paramName] = $urlParts[$index];
      }
    }

    return $params;
  }

  protected function matchRule(string $url, string $rule) :bool {
    (array) $urlParts = explode('/', trim($url, '/'));
    (array) $ruleParts = explode('/', trim($rule, '/'));

    if (count($urlParts) !== count($ruleParts)) {
      return false;
    }

    foreach($ruleParts as $index => $rulePart) {
      if ($rulePart !== $ruleParts[$index] && strpos($rulePart, ':') !== 0) {
        return false;
      }
    }

    return true;
  }

  protected function run() {
    (string) $url = parse_url($this->url, PHP_URL_PATH);
    (bool) $ifRouteNotExist = true;

    foreach ($this->routes as $route => $controller) {
      if ($this->matchRule($url, $route)) {
        $ifRouteNotExist = false;
        (array) $params = $this->extractParams($url, $route);

        new $controller($params);
      }
    }
    if ($ifRouteNotExist) {
      echo '404 Not Found';
    }
  }
}
