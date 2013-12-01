<?php
/**
 * Description of ninhoModel
 *
 * @author MSeixas
 */
class ninhoModel extends Model {
    public $_table = "ninho";
    public function cad(){
    }
    public function cons(){
        return $this->read();
    }
}
