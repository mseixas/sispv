<?php
/**
 * Description of ninhoController
 *
 * @author MSeixas
 */
class ninhoController  extends Controller{
    public function cad(){
        
    }
    public function cons(){
        $model = new ninhoModel();
        $ninho = $model->cons();
        $data['ninho'] = $ninho;
            
        $this->view('Consulta/ninhoCons', $data);
    }
}
