<?php
namespace App\controllers;

use App\QueryBuilder;

use League\Plates\Engine;

use Delight\Auth\Auth;

use \Tamtamchik\SimpleFlash\Flash;

use SimpleMail;

//use Valitron\Validator;

use PDO;

class MainController {

    protected $templates;
    protected $db;
    protected $auth;
    protected $validator;

    public function __construct()
    {
        $this->templates = new Engine('../app/views');
        $this->db = new QueryBuilder();
        $db = new PDO('mysql:host=localhost;dbname=marlin', 'mysql', 'mysql');
        $this->auth = new \Delight\Auth\Auth($db);

        //$this->validator = new Validator($_POST);
        
    } 

    public function registration(){ 
    	/*
        $this->v->rule('required', ['password', 'password_confirmation']);
        $this->v->rule('equals', 'password', 'password_confirmation');
        if(!$this->v->validate()) {
            // Errors
            foreach ($this->v->errors() as $error) {
                flash()->error($error);
            }
            header("Location: /profile");
            exit();
        }
        */

        $flash = new Flash();

        try {
        $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['name'], function ($selector, $token) {
            SimpleMail::make()
            ->setTo($_POST['email'], $_POST['name'])
            ->setFrom('abuelofrio@yandex.ru', 'Alexey')
            ->setSubject('Registration')
            ->setMessage('https://www.your_cite_adress.com/verify_email?selector=' . \urlencode($selector) . '&token=' . \urlencode($token))
            ->send();
        });
        flash()->success('We have signed you up! We also ask you to veryfy your email adress. Just check you mail and click the link. This will provide you acsees to our  site.');
            header("Location: /login_page");
            exit();
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('User already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
        }   
        
        header("Location: /registration_page");
        exit();     
    }


    public function login(){  

        try {
        $this->auth->login($_POST['email'], $_POST['password']);

        header("Location: /");
            exit();
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Wrong email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->error('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
        }  
        
        header("Location: /login_page");
        exit();       
    }


    public function logout()
    {
        $this->auth->logOut();
        header("Location: /login_page");
        exit();
    }


    public function email_verification(){

        try {
        $this->auth->confirmEmail($_GET['selector'], $_GET['token']);
            flash()->success('Email address has been verified');
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Invalid token');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Token expired');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('Email address already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
        }

        header("Location: /login_page");
        exit();
    }

}