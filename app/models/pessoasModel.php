<?php
/**
 * Description of pessoas
 *
 * @author MSeixas
 */
class pessoasModel extends Model {
    public $_table = 'pessoas';

    public function cons(){
        $where = 'excluido IS NOT TRUE';
        return $this->read($where,null,null,'descricao ASC');
    }
    public function excluir($where){
        $sql = "UPDATE `{$this->_table}` SET excluido='1' WHERE id IN ({$where})";
        $this->query($sql);
    }
}
