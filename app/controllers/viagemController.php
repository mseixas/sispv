<?php

/**
 * Description of pessoasController
 *
 * @author MSeixas
 */
class viagemController extends Controller {

    public function index_action() {
        $this->cad();
    }

    public function cad() {
        $pessoasModel = new pessoasModel();
        $localModel = new localModel();
        $viagemModel = new viagemModel();
        $id = $this->getParams('id');
        if ($id != null) {
            $editar = $viagemModel->findEdit($id);
            if ($editar != null) {
                $data['editar'] = $editar;
            } else {
                $data['editar'] = array();
            }
        }
        
        $local = $localModel->cons();
        $pessoa = $pessoasModel->cons();

        $data['local'] = $local;
        $data['pessoas'] = $pessoa;

        $this->view('Cadastro/viagemCad', $data);
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
        $viagemModel       = new viagemModel();
        $pessoaviagemModel = new pessoaviagemModel();
        
        $id = $this->getParams('id');
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
            $descricao = array('data_ida' => $_POST['data_ida'],
                               'data_volta' => $_POST['data_volta'],
                               'local' => $_POST['local']);
            $where = 'id = ' . $_POST['id'];
            $viagemModel->update($descricao, $where);
            $del = $pessoaviagemModel->del($id);
            $pessoasId = $_POST['cad'];
            foreach ($pessoasId as $pessoa){
                $pessoaviagemModel->cad($id, $pessoa);
            }
            $this->cons();
        }
    }

    public function excluirAction() {
        $model = new viagemModel();
        $where = $_POST['del'];
        $where = implode(', ', $where);
        $model->excluir($where);
        $this->cons();
    }

}
