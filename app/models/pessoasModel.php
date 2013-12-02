<?php
/**
 * Description of pessoas
 *
 * @author MSeixas
 */
class pessoasModel extends Model {
    public $_table = 'pessoas';

    public function cons(){
        $sql = 'SELECT p.id as id, p.descricao as nome, c.descricao as cargo 
                FROM pessoas p
                JOIN cargo c ON p.`cargo` = c.`id` 
                WHERE p.excluido IS NOT TRUE';
        return $this->query($sql);
    }
    public function excluir($where){
        $sql = "UPDATE `{$this->_table}` SET excluido='1' WHERE id IN ({$where})";
        $this->query($sql);
    }
}
