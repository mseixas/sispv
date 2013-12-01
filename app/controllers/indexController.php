<?php

class indexController extends Controller {

    public function index_action() {
        $model = new menuModel();
        $menu_cadastros = $model->listMenu('tipo = 1');
        $menu_consultas = $model->listMenu('tipo = 2');
        $menu_relatorios = $model->listMenu('tipo = 3');
        
        $data['cadastros'] = $menu_cadastros;
        $data['consultas'] = $menu_consultas;
        $data['relatorios'] = $menu_relatorios;
        
        $this->view('index', $data);
    }
}
