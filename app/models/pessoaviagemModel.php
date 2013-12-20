<?php

/**
 * Description of pessoas
 *
 * @author MSeixas
 */
class pessoaviagemModel extends Model {

    public $_table = 'pessoa_viagem';

    public function cons() {
        return $this->read();
    }

    public function cad($viagem, $pessoa) {
        $data = array('viagem' => $viagem,
            'pessoa' => $pessoa);
        $this->insert($data);
    }
    
    public function del($viagem) {
        $data = "viagem = ".$viagem;
        $this->delete($data);
    }

    public function findByPessoa($id) {
        $where = 'pessoa = ' . $id;
        return $this->read($where);
    }

    public function findByViagem($id) {
        $where = 'pessoa = ' . $id;
        return $this->read($where);
    }

}
