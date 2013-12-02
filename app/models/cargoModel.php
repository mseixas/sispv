<?php
/**
 * Description of pessoas
 *
 * @author MSeixas
 */
class cargoModel extends Model {
    public $_table = 'cargo';

    public function cons(){
        $where = 'excluido IS NOT TRUE';
        return $this->read($where,null,null,'id ASC');
    }
    public function excluir($where){
        $sql = "UPDATE `{$this->_table}` SET excluido='1' WHERE id IN ({$where})";
        $this->query($sql);
    }
}
