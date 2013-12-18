<?php

/**
 * Description of Controller
 *
 * @author MSeixas
 */
class Controller extends System {

    public function __construct() {
        parent::__construct();
        $url = $this->getUrl();
        if (!isset($_SESSION['id']) && ($url != 'login')) {
            $this->redirect("/login");
        }
        if (isset($_SESSION['id'])) {
            $time = $_SESSION['time'];
            $limit = $_SESSION['limit'];
            $segundos = time() - $time;
            if ($segundos > $limit) {
                session_destroy();
                $this->redirect('/login/expirado');
            }
        }
    }

    protected function view($nome, $vars = null) {
        if (is_array($vars) && count($vars) > 0) {
            extract($vars, EXTR_PREFIX_ALL, 'view');
        }
        return require_once(VIEWS . $nome . '.phtml');
        exit();
    }

    public function redirect($local) {
        header("Location: $local");
    }

}
