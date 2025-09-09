<?php

class UserController extends Controller
{
    public function index()
    {
        $this->view("user/index");
    }

    public function add()
    {
        $this->view("user/add");
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';

            // just for testing, echo the name
            echo "User saved: " . htmlspecialchars($name);
        } else {
            echo "Invalid request!";
        }
    }
}

