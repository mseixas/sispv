<?php

/**
 * Description of arvoreController
 *
 * @author MSeixas
 */
class arvoreController extends Controller {

    public function index_action() {
    }

    public function cad() {
        $arvoreModel = new arvoreModel();

        $id = $this->getParams('id');
        if ($id != null) {
            $arvore = $arvoreModel->findById($id);
            if ($arvore != null) {
                $data['editar'] = $arvore;
            } else {
                $data['editar'] = array();
            }
        }
        else{
            $data = '';
        }
        $this->view('Cadastro/arvoreCad', $data);
    }
    
    public function cons() {
        $model = new arvoreModel();
        $arvore = $model->cons();
        $data['arvore'] = $arvore;

        $this->view('Consulta/arvoreCons', $data);
    }

    public function editarAction() {
        
    }

    public function cadastrarAction() {
        $id = $this->getParams('id');
        $model = new arvoreModel();
        if ($id == NULL) {
            $info = array('descricao' => $_POST['descricao'], 
                          'nome_cientifico' => $_POST['nome_cientifico'], 
                          'autor' => $_POST['autor'],
                          'ano' => $_POST['ano']);
            $data = $info;
            $model->insert($data);
            $this->cons();
        }
        else{
            $info = array('descricao' => $_POST['descricao'], 
                          'nome_cientifico' => $_POST['nome_cientifico'], 
                          'autor' => $_POST['autor'],
                          'ano' => $_POST['ano']);
            $where = 'id = '.$_POST['id'];
            $model->update($info, $where);
            $this->cons();
        }
    }

    public function excluirAction() {
        $model = new arvoreModel();
        $where = $_POST['del'];
        $where = implode(', ', $where);
        $model->excluir($where);
        $this->cons();
    }

}
