<?php
/**
 * Description of ninhoModel
 *
 * @author MSeixas
 */
class ninhoModel extends Model {
    public $_table = "ninho";
    public function __construct() {
        parent::__construct();
    }
    public function cad(){
    }
    public function cons(){
        print_r($this->read('numero = 5333'));
        return $this->read();
    }
}
