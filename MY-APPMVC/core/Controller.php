<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);
         require __DIR__ . "/Controllers/Views/$view.php";

    }
}

