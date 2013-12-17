<?php

/**
 * Description of pessoas
 *
 * @author MSeixas
 */
class loginModel extends Model {

    public $_table = 'pessoas';

    public function index_action() {
        
    }

    public function logar($login, $pass) {
        $where = 'login = \'' . $login . '\' AND senha = \'' . $pass . '\' AND excluido IS NOT TRUE';
        $data = $this->read($where);


        if ($data != NULL) {

            session_start();
            $_SESSION['id'] = $data[0]['id'];
            $_SESSION['nom'] = $data[0]['descricao'];
            $_SESSION['usu'] = $data[0]['login'];
            $_SESSION['mail'] = $data[0]['email'];
            $_SESSION['car'] = $data[0]['cargo'];

            return true;
        } else {
            return false;
        }
    }

}
