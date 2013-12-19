<?php

/**
 * Description of pessoasController
 *
 * @author MSeixas
 */
class viagemController extends Controller {

    public function index_action() {
        
    }

    public function cad() {
        $pessoasModel = new pessoasModel();
        $localModel = new localModel();
        
        $id = $this->getParams('id');
        
                
        
        $local = $localModel->cons();
        $pessoa = $pessoasModel->cons();

        $data['local'] = $local;
        $data['pessoas'] = $pessoa;

        $this->view('Cadastro/viagemCad', $data);
//        $id = $this->getParams('id');
//        
//        if ($id != null) {
//            $pessoa = $pessoasModel->findById($id);
//            if ($pessoa != null) {
//                $data['editar'] = $pessoa;
//            } else {
//                $data['editar'] = array();
//            }
//        }
//        $pessoas = $pessoasModel->cons();
//        $local = $localModel->cons();
//        $data['local'] = $local;
//        $data['pessoas'] = $pessoas;
//        
//        $this->view('Cadastro/viagemCad', $data);
    }

    public function cons() {
        $model          = new viagemModel();
        $viagem         = $model->cons();
        $data['viagem'] = $viagem;

        $this->view('Consulta/viagemCons', $data);
    }

    public function editarAction() {
    }

    public function cadastrarAction() {
        $id = $this->getParams('id');
        $viagemModel       = new viagemModel();
        $pessoaviagemModel = new pessoaviagemModel();
        if ($id == NULL) {
            $descricao = array('data_ida' => $_POST['data_ida'],
                               'data_volta' => $_POST['data_volta'],
                               'local' => $_POST['local']);
            $viagemModel->cad($descricao);
            $viagem = $viagemModel->findLast();
            $pessoasId = $_POST['cad'];
            foreach ($pessoasId as $pessoa){
                $pessoaviagemModel->cad($viagem, $pessoa);
            }
            $this->cons();
        } else {
            $descricao = array('descricao' => $_POST['descricao'],
                'cargo' => $_POST['cargo'],
                'email' => $_POST['email'],
                'login' => $_POST['login']);
            $where = 'id = ' . $_POST['id'];
            $model->update($descricao, $where);
            $this->cons();
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
