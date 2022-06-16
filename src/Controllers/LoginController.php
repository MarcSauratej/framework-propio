<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
require('src/helpers.php');

class LoginController extends Controller {

    public function index() {
        return view('login');
    }

    public static function auth($db, $email, $password):bool {      
        try {   
            $statement = $db->query('SELECT * FROM users WHERE email=:email LIMIT 1');
            $statement->execute([':email'=>$email]);
            $count = $statement->rowCount();
            $row = $statement->fetchAll(\PDO::FETCH_ASSOC);
            if($count == 1) {       
                $user = $row[0];
                //dd($user);
                $res = password_verify($password, $user['passwd']);
                
                if($res) {
                    $_SESSION['logged'] = true;
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['user']=$user;
                    $_SESSION['curso'] = $user['curso'];
                    return true;
                } else {
                    return false;
                }
    
            } else {
                return false;
            }
    
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function login() {
        if(isset ($_REQUEST['passwd']) && isset ($_REQUEST['email'])) {
        
            $passwd = filter_input(INPUT_POST, 'passwd');
            $email = filter_input(INPUT_POST, 'email');

            //dd($email);
            //dd($passwd);
            $db = Registry::get('database');
            //dd($db);
            if(LoginController::auth($db, $email, $passwd)) {
                //dd($email);
                //dd($db);
            //dd($passwd);
                if($_POST['remember']) {
                    setcookie("emailCookie", $email, time()+86400);
                    setcookie("passwordCookie", $passwd, time()+86400);
                }
                
                $this->redirectTo("dashboard");
                
            } else {
                $this->redirectTo("badlogin");
            }

        } else {
            $this->redirectTo("badlogin");
        }
    }

    public function logout() {
        session_destroy();

        $email = $_COOKIE['emailCookie'];
        $passwd = $_COOKIE['passwordCookie'];
        setcookie("emailCookie", $email, -1);
        setcookie("passwordCookie", $passwd, -1);

        $this->redirectTo("index");
    }

    public function badLogin() {
        return view('badlogin');
    }
}
