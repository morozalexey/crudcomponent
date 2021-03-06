<?php

namespace App\controllers;

use App\QueryBuilder;

use League\Plates\Engine;

use Delight\Auth\Auth;

use \Tamtamchik\SimpleFlash\Flash;

use PDO;

class PagesController {

    private $templates;
    private $db;
    private $auth;

    public function __construct(QueryBuilder $qb, Engine $engine, Auth $auth)
    {
        $this->templates = $engine;
        $this->db = $qb;
    }

    public function index(){      
        
        $comments = $this->db->getAllComments('comments');       
        
        echo $this->templates->render('homepage', ['comments' => $comments]);       
    }

    public function profile(){   
          
        $users = $this->db->getOne('users', $_SESSION['auth_user_id']);     
        
        echo $this->templates->render('profile', ['users' => $users]);       
    }

    public function registration_page(){

        echo $this->templates->render('registration');
    }

    public function login_page(){

        echo $this->templates->render('login');
    } 

    public function admin(){

        $comments = $this->db->getAll('comments');

        echo $this->templates->render('admin', ['comments' => $comments]);
    } 
}