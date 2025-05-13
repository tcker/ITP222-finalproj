<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);
        include "views/{$view}.php";
    }
}
?>
