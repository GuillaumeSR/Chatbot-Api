<?php

namespace App\Controllers;

class User {
  protected array $params;

  public function __construct($params) {
    $this->params = $params;
    
    $this->run();
  }

  protected function header() {
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");
}

  protected function getUser() {
    echo json_encode([
      'firstname' => 'Max',
      'lastname' => 'ouaipamal',
      'promo' => 'kappa',
      'school' => 'coda'
    ]);
  }

  protected function run() {
    $this->getUser();
    // $this->header();
  }
}
