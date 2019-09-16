<?php
namespace dabank\sdk\crypto;

trait Helper {

  static public function clearTextMessage(array $data, array $excludes) {
    $r = array_diff_key($data, array_flip($excludes));
    ksort($r);
    return urldecode(http_build_query($r));
  }
}
