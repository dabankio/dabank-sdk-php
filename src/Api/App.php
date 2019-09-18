<?php
namespace Bigbang\Api;

class App extends AbstractApi {

  public function accounts() {
    return $this->post("appAccount", []);
  }
}
