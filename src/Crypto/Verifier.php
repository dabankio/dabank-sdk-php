<?php

namespace Bigbang\Crypto;

interface Verifier
{
    function verify(array $data, $sig);
}
