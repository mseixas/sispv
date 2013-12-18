<?php

/**
 * Description of loginController
 *
 * @author MSeixas
 */
class loginController extends Controller {

    public function index_action() {
        if (!isset($_SESSION['id']))
            $this->view('login');
        else
            $this->redirect('index');
    }

    public function expirado() {
        $data['sessao'] = TRUE;
        $this->view('login', $data);
    }
    public function erro() {
        $data['erro'] = TRUE;
        $this->view('login', $data);
    }

}
