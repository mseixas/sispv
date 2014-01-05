<?php

define('CONTROLLERS', 'app/controllers/');
define('VIEWS', 'app/views/');
define('MODELS', 'app/models/');
define('HELPERS', 'system/helpers/');
//define('TEMPLATE', '/home/nomos172/public_html/mseixas.com.br/app/views/');
define('TEMPLATE', '/app/views/');

require_once 'system/system.php';
require_once 'system/controller.php';
require_once 'system/model.php';

function __autoload($file) {
    //echo '<br>file: '. $file.'<br>';
    if (file_exists(MODELS.$file.'.php'))
            require_once MODELS.$file.'.php';
    else if (file_exists(HELPERS.$file.'Helper.php'))
        require_once HELPERS.$file.'Helper.php';
    else
        die("Model/Helper não encontrado");
}

$start = new System();
$start->run();
