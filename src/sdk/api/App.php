<?php
namespace dabank\sdk\api;

class App extends AbstractApi {

  public function accounts() {
    return $this->post("appAccount", []);
  }
}
