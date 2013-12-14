<?php

/**
 * Description of pessoasController
 *
 * @author MSeixas
 */
class arvoreController extends Controller {

    public function index_action() {
    }

    public function cad() {
        $pessoasModel = new arvoreModel();

        $id = $this->getParams('id');
        if ($id != null) {
            $pessoa = $pessoasModel->findById($id);
            if ($pessoa != null) {
                $data['editar'] = $pessoa;
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
            $descricao = array('descricao' => $_POST['descricao'], 'cargo' => $_POST['cargo']);
            $where = 'id = '.$_POST['id'];
            $model->update($descricao, $where);
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
