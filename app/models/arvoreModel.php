<?php
/**
 * Description of pessoas
 *
 * @author MSeixas
 */
class arvoreModel extends Model {
    public $_table = 'arvore';

    public function cons(){
        $where = 'excluido IS NOT TRUE';
        return $this->read($where);
    }
    public function excluir($where){
        $sql = "UPDATE `{$this->_table}` SET excluido='1' WHERE id IN ({$where})";
        $this->query($sql);
    }
    public function findById($id){
        $where = 'id = '.$id;
        return $this->read($where);
    }
}
