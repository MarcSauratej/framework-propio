<?php

namespace App\Database;

class Connection {

    public static function make($config) {

        $dsn = $config['connection'].';dbname='.$config['dbname'];

        try {
            return new \PDO(
                $dsn,
                $config['dbuser'],
                $config['dbpassword'],
                $config['options']
            );
        } catch (\PDOException $e) {
            die ($e->getMessage());
        }
    }

    public static function auth($db,$email,$pass):bool
    {
        
        try{   
            
            $stmt=$db->prepare('SELECT * FROM USERS WHERE email=:email LIMIT 1');
            $stmt->execute([':email'=>$email]);
            $count=$stmt->rowCount();
            $row=$stmt->fetchAll(\PDO::FETCH_ASSOC);  
            
            if($count==1){       
                $user=$row[0];
                $res=password_verify($pass,$user['passwd']);
               
                if ($res){
                $_SESSION['username']=$user['userame'];
                $_SESSION['email']=$user['email'];
           
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }catch(\PDOException $e){
            return false;
        }
    }
}