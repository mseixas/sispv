<?php

/**
 * Description of localModel
 *
 * @author MSeixas
 */
class localModel extends Model {

    public $_table = 'local';

    public function cons(){
        $sql = 'SELECT	l.id AS id,
                l.descricao AS descricao,
                l.latitude AS latitude,
                l.longitude AS longitude,
                c.id AS cidadeid,
                c.descricao AS cidade
        FROM `local` l
        INNER JOIN cidade c ON c.id = l.cidade
        WHERE l.excluido IS NOT TRUE';
        return $this->queryReturn($sql);
    }

    public function excluir($where) {
        $sql = "UPDATE `{$this->_table}` SET excluido='1' WHERE id IN ({$where})";
        $this->query($sql);
    }

    public function findById($id) {
        $where = 'id = ' . $id;
        return $this->read($where);
    }

    public function findByLogin($login) {
        $where = 'login = ' . $login;
        return $this->read($where);
    }

}
