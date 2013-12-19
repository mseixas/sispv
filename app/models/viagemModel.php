<?php

/**
 * Description of pessoas
 *
 * @author MSeixas
 */
class viagemModel extends Model {

    public $_table = 'viagem';

    public function cons() {
        $sql = "SELECT v.id as id,
                       DATE_FORMAT( v.`data_ida`, '%d/%m/%Y' ) AS data_ida,
                       DATE_FORMAT( v.`data_volta`, '%d/%m/%Y' ) AS data_volta,
                       l.descricao as local,
                       group_concat(p.`descricao` SEPARATOR '/') AS pessoas
                FROM `viagem` v
                INNER JOIN `pessoa_viagem` pv ON v.id = pv.viagem
                INNER JOIN `pessoas` p ON pv.`pessoa` = p.id
                INNER JOIN `local` l ON l.`id` = v.`local`
                GROUP BY v.id
                ORDER BY data_ida DESC";
        return $this->queryReturn($sql);

//        $where = 'excluido IS NOT TRUE';
//        return $this->read($where);
    }

    public function cad($values) {
        return $this->insert($values);
    }

    public function excluir($where) {
        $sql = "UPDATE `{$this->_table}` SET excluido='1' WHERE id IN ({$where})";
        $this->query($sql);
    }

    public function findLast() {
        $sql = "SELECT MAX(id) AS id FROM viagem";
        $viagem = $this->queryReturn($sql);
        $id = $viagem[0]['id'];
        return $id;
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
