<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
require('src/helpers.php');

class DashboardController extends Controller {
    
    public function index() {
        $user = $_SESSION['user']['id'];

        if(!$user) {
            $this->redirectTo("index");
        }

        $db = Registry::get('database');

        try {
            $statement = $db->query("SELECT tlistname FROM list WHERE username = ?");
            $statement->execute([$user]);
            $lists = $statement->fetchAll(\PDO::FETCH_COLUMN, 0);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $statement = $db->query("SELECT taskname FROM task;");
            $statement->execute([$user]);
            $tasks = $statement->fetchAll(\PDO::FETCH_COLUMN, 0);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
       
        return view('dashboard', ['lists' => $lists, 'tasks' => $tasks]);
    }
}