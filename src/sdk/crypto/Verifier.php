<?php

namespace dabank\sdk\crypto;

interface Verifier {
    function verify(array $data, string $sig);
}
