<?php

define("DS",DIRECTORY_SEPARATOR);
define("ROOT",dirname(__DIR__).DS);
define("APP",ROOT."app".DS);
define("CONTROLLER",APP."controller".DS);
define("CORE",APP."core".DS);
define("MODEL",APP."model".DS);
define("VIEW",APP."view".DS);
define("CONFIG",APP."config".DS);

$modules = [CONTROLLER,CORE,MODEL,VIEW,CONFIG];

set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
spl_autoload_register('spl_autoload',false);
$app = new app();