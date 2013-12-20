<?php

/**
 * Description of especieController
 *
 * @author MSeixas
 */
class especieController extends Controller {

    public function index_action() {
    }

    public function cad() {
        $especieModel = new especieModel();

        $id = $this->getParams('id');
        if ($id != null) {
            $especie = $especieModel->findById($id);
            if ($especie != null) {
                $data['editar'] = $especie;
            } else {
                $data['editar'] = array();
            }
        }
        else{
            $data = '';
        }
        $this->view('Cadastro/especieCad', $data);
    }
    
    public function cons() {
        $model = new especieModel();
        $especie = $model->cons();
        $data['especie'] = $especie;

        $this->view('Consulta/especieCons', $data);
    }

    public function editarAction() {
        
    }   

    public function cadastrarAction() {
        $id = $this->getParams('id');
        $model = new especieModel();
        if ($id == NULL) {
            $info = array('sigla' => $_POST['sigla'],
                          'descricao' => $_POST['descricao'], 
                          'nome_cientifico' => $_POST['nome_cientifico']);
            $model->insert($info);
            $this->cons();
        }
        else{
            $info = array('sigla' => $_POST['sigla'],
                          'descricao' => $_POST['descricao'], 
                          'nome_cientifico' => $_POST['nome_cientifico']);
            $where = 'id = '.$_POST['id'];
            $model->update($info, $where);
            $this->cons();
        }
    }

    public function excluirAction() {
        $model = new especieModel();
        $where = $_POST['del'];
        $where = implode(', ', $where);
        $model->excluir($where);
        $this->cons();
    }

}
