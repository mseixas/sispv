<?php
/**
 * Description of Controller
 *
 * @author MSeixas
 */
class Controller extends System{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    protected function view($nome, $vars = null){
        //session_start();
        if(is_array($vars) && count($vars) > 0){
            extract($vars, EXTR_PREFIX_ALL, 'view');
        }
        return require_once(VIEWS.$nome.'.phtml');
        exit();
    }
    public function redirect($local){
        header("Location: $local");
    }
}