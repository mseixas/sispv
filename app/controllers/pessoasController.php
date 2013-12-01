<?php
/**
 * Description of pessoasController
 *
 * @author MSeixas
 */
class pessoasController extends Controller{
    public function index_action(){
    }
    public function cad(){
        $this->view('Cadastro/pessoasCad');
    }
    public function cons(){
        $model = new pessoasModel();
        $pessoas = $model->cons();
        $data['pessoas'] = $pessoas;
            
        $this->view('Consulta/pessoasCons', $data);
    }
    public function cadastrar(){
        echo $_POST['descricao'];
    }
}
