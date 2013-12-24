<?php

/**
 * Description of localController
 *
 * @author MSeixas
 */
class localController extends Controller {

    public function index_action() {
        $this->cad();
    }

    public function cad() {

        $localModel = new localModel();
        $cidadeModel = new cidadeModel();

        $id = $this->getParams('id');
        if ($id != null) {
            $pessoa = $localModel->findById($id);
            if ($pessoa != null) {
                $data['editar'] = $pessoa;
            } else {
                $data['editar'] = array();
            }
        }
        $cidade = $cidadeModel->cons();
        $data['cidade'] = $cidade;
        $this->view('Cadastro/localCad', $data);
    }

    public function cons() {
        $model = new localModel();
        $local = $model->cons();
        $data['local'] = $local;

        $this->view('Consulta/localCons', $data);
    }

    public function editarAction() {
        
    }

    public function cadastrarAction() {
        $id = $this->getParams('id');
        $model = new localModel();
        if ($id == NULL) {
            $descricao = array('descricao' => $_POST['descricao'],
                'latitude' => $_POST['latitude'],
                'longitude' => $_POST['longitude'],
                'cidade' => $_POST['cidade']);
            $model->insert($descricao);
            $this->cons();
        } else {
            $descricao = array('descricao' => $_POST['descricao'],
                'latitude' => $_POST['latitude'],
                'longitude' => $_POST['longitude'],
                'cidade' => $_POST['cidade']);
            $where = 'id = ' . $_POST['id'];
            $model->update($descricao, $where);
            $this->cons();
        }
    }

    public function excluirAction() {
        $model = new localModel();
        $where = $_POST['del'];
        $where = implode(', ', $where);
        $model->excluir($where);
        $this->cons();
    }

}
