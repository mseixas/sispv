<?php
/**
 * Description of menuModel
 *
 * @author MSeixas
 */
class menuModel extends Model{
        public $_table = 'menu';
        
        public function listMenu($tipo = null){
            $where = $tipo.' AND excluido IS NOT TRUE';
            $menu = $this->read($where,null,null,'descricao ASC');
//            utf8_encode($menu);
//            $menu[1]['descricao'] = utf8_encode($menu[1]['descricao']);
//            var_dump($menu);
            return $menu;
    }
}
