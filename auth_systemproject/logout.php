<?php
require_once __DIR__ . '/function.php';
logout_user(); // handles token revoke + session destroy + redirect + flash
