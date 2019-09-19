<?php

namespace Bigbang\api;

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
