<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
use App\Database\Connection;
require('src/helpers.php');

class RegisterController extends Controller {

    public function index() {
        return view('register');
    }

    public function register() {

        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['passwd']) && isset($_POST['curso'])&& isset($_POST['role'])) {
            $user = filter_input(INPUT_POST, 'username');
            $email = filter_input(INPUT_POST, 'email');
            $passwd = filter_input(INPUT_POST, 'passwd');
            $curso = filter_input(INPUT_POST, 'curso');
            $role = filter_input(INPUT_POST, 'role');
            $hashedPasswd = password_hash($passwd, PASSWORD_BCRYPT);

            $db = Registry::get('database');
            try {
                $statement = $db->query("INSERT INTO users(username, email, passwd,  curso, role) VALUES(?, ?, ?, ?, ?)");
                $statement->execute([$user, $email,$hashedPasswd, $curso, $role]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
            $this->redirectTo("index");
            
        }
    }
}
