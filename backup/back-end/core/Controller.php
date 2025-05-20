<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);
        include __DIR__ . "/../views/{$view}.php";

    }
    
}
?>
