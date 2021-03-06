<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
require('src/helpers.php');

class ManagerController extends Controller
{

    function index()
    {
        $user = $_SESSION['user']['id'];
        $db=Registry::get('database');
        $tasks = NULL;

        try {
            $stmt = $db->query("SELECT tlistname FROM list WHERE username=?");
            $stmt->execute([$user]);
            
            $result = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        if (isset ($_POST['listSelection'])) {

            $user = $_SESSION['user'];
            $listName = filter_input(INPUT_POST, 'listSelection');
        
            try {
                $stmt = $db->query("SELECT taskName FROM task t1 INNER JOIN list t2 ON t1.listId = t2.listCode WHERE listName = ?;");
                $stmt->execute([$listName]);
                $tasks = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);
                
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } 
            try {
                $stmt = $db->query("SELECT listCode FROM list WHERE  listName = ?");
                $stmt->execute([$listName]);
                $listId = $stmt->fetchAll();
                $_SESSION['currentList']=$listId[0]['listCode'];
        
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } 
        }
       
    return view('manager', ['result' => $result , 'tasks' => $tasks]);
    }

    function taskcreation(){

        if (isset ($_POST['taskname'])) {
    
            $user = $_SESSION['user']['username'];
            $taskName = filter_input(INPUT_POST, 'taskname');
            $currentList = $_SESSION['currentList'];
            $db=Registry::get('database');
            
            try {
                $stmt = $db->query("INSERT INTO tasks(list, taskname) VALUES(?,?)");
                $stmt->execute([$currentList, $taskName]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("manager");
        }
    }

    function listcreation() {
        if (isset ($_POST['listname'])) {
            $user = $_SESSION['user']['username'];
            $listName = filter_input(INPUT_POST, 'listname');
            $db=Registry::get('database');
            
            try {
                $stmt = $db->query("INSERT INTO lists(username, listname) VALUES(?,?)");
                $stmt->execute([$user, $listName]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("manager"); 
        }
    }
}