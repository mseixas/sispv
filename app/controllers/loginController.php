<?php

/**
 * Description of loginController
 *
 * @author MSeixas
 */
class loginController extends Controller {

    public function index_action() {
        $this->view('login');
    }

//    public function logar() {
//        $model = new loginModel();
//        $login = $_POST['login'];
//        $pass = md5($_POST['senha']);
//        $ok = $model->logar($login, $pass);
//        if($ok) {
//        } else {
//            $this->view('login');
//        }
//    }
}