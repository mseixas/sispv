<?php
/**
 * Description of Controller
 *
 * @author MSeixas
 */
class Controller extends System{
    protected function view($nome, $vars = null){
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