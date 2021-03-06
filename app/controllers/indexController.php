<?php

class indexController extends Controller {

    public function index_action() {
        if (isset($_SESSION['id'])) {
            $this->home();
        } else {
            $this->redirect('/login');
        }
    }

    public function home() {
        $model = new menuModel();
        
        $menu_cadastros = $model->listMenu('tipo = 1');
        $menu_consultas = $model->listMenu('tipo = 2');
        $menu_relatorios = $model->listMenu('tipo = 3');

        $data['cadastros'] = $menu_cadastros;
        $data['consultas'] = $menu_consultas;
        $data['relatorios'] = $menu_relatorios;

        $this->view('index', $data);
    }

    public function logar() {
        $model = new loginModel();
        $login = $_POST['login'];
        $pass = md5($_POST['senha']);
        $ok = $model->logar($login, $pass);
        if ($ok) {
            $this->redirect("/index");
        } else {
            $this->redirect('/login/erro');
        }
    }

    public function deslogar() {
        session_destroy();
        $this->redirect('/login');
    }

}
