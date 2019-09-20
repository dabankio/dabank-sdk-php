<?php

namespace Bigbang\Api;

class Debug extends AbstractApi
{

    public function hello()
    {
        return $this->post("/hello", []);
    }

    public function time()
    {
        return $this->post("/time", []);
    }
}
