<?php

namespace dabank\sdk\crypto;

interface Signer {
    function sign(array $data);
}


