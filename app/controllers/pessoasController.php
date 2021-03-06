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

        $pessoasModel = new pessoasModel();
        $cargoModel = new cargoModel();

        $id = $this->getParams('id');
        if ($id != null) {
            $pessoa = $pessoasModel->findById($id);
            if ($pessoa != null) {
                $data['editar'] = $pessoa;
            } else {
                $data['editar'] = array();
            }
        }
        $cargo = $cargoModel->cons();
        $data['cargo'] = $cargo;
        $this->view('Cadastro/pessoasCad', $data);
    }

    public function cons() {
        $model = new pessoasModel();
        $pessoas = $model->cons();
        $data['pessoas'] = $pessoas;

        $this->view('Consulta/pessoasCons', $data);
    }

    public function editarAction() {
        $model = new pessoasModel();
        $descricao = array('descricao' => $_POST['descricao'],
                'cargo' => $_POST['cargo'],
                'email' => $_POST['email'],
                'login' => $_POST['login']
            );
            $where = 'id = ' . $_POST['id'];
            $model->editar($descricao, $where);
            $this->cons();
    }

    public function cadastrarAction() {
        $id = $this->getParams('id');
        $model = new pessoasModel();
        if ($id == NULL) {
            $descricao = array('descricao' => $_POST['descricao'],
                'cargo' => $_POST['cargo'],
                'email' => $_POST['email'],
                'login' => $_POST['login'],
                'senha' => md5($_POST['senha'])
            );
            $data = $descricao;
            $model->insert($data);
            $this->cons();
        } else {
            $this->editarAction();
        }
    }

    public function excluirAction() {
        $model = new pessoasModel();
        $where = $_POST['del'];
        $where = implode(', ', $where);
        $model->excluir($where);
        $this->cons();
    }

}
