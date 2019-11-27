<?php
// autoloader for namespace prefix Bigbang\
class BigbangAutoloader {

    public static function register() {
        spl_autoload_register(function ($class) {
            // namespace prefix
            $prefix = 'Bigbang\\';
            // base directory for the namespace prefix
            $base_dir = __DIR__ . '/src/';

            $len = strlen($prefix);
            if (strncmp($prefix, $class, $len) !== 0) {
                return;
            }

            $relative_class = substr($class, $len);
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

            if (file_exists($file)) {
                require $file;
            }
        });
    }
}
