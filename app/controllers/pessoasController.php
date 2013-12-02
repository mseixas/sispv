<?php

/**
 * Description of pessoasController
 *
 * @author MSeixas
 */
class pessoasController extends Controller {

    public function index_action() {
        
    }

    public function cad() {
        $model = new cargoModel();
        $cargo = $model->cons();
        $data['cargo'] = $cargo;
        
        $this->view('Cadastro/pessoasCad', $data);
    }

    public function cons() {
        $model = new pessoasModel();
        $pessoas = $model->cons();
        $data['pessoas'] = $pessoas;

        $this->view('Consulta/pessoasCons', $data);
    }

    public function cadastrar() {
        $model = new pessoasModel();
        $descricao = array('descricao' => $_POST['descricao'], 'cargo' => $_POST['cargo']);
        $data = $descricao;
        $model->insert($data);
        $this->cons();
    }

    public function editar() {
        $model = new pessoasModel();
        //print_r($_POST['del']);
        //$where = 'id IN ('..')';
    }

    public function excluir() {
        $model = new pessoasModel();
        $where = $_POST['del'];
        $where = implode(', ', $where);
        $model->excluir($where);
        $this->cons();
    }

}
