<?php

namespace Rentit\Controllers;

use Rentit\Controller;

use Rentit\Models\User;
use Rentit\Session;

final class UserController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $data = ['title' => 'User'];
        $this->render($data);
    }

    private function create_user($email, $passwd, $phone)
    {
        $user = User::create([
            'email' => $email,
            'passw' => $passwd,
            'phone' => $phone
        ]);

        return $user;
    }

    public function login()
    {
        $this->render(null, 'login');
    }

    public function register()
    {
        $this->render(null, 'register');
    }

    public function signin(){
       /* if ($this->verifyToken($_POST['token'], 600)){

        }*/

       if ( !empty($_REQUEST['email']) && !empty($_REQUEST['passwd'])){
           $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
           $passwd = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_STRING);

           $user = User::where('email', '=', $email)->first();


           if (!empty($user) && password_verify($passwd, $user->passw) == true){
               session_start();
               Session::set('username', $user->email);
               Session::set('user', $user->id);
               Session::set('logged', true);
               header('location:/');
           } else {

              return $this->error("User or password doesn't match");
           }
       } else {
           $this->error("Fill the form");
       }
    }

    public function signup()
    {
        if (!empty($_REQUEST['email']) &&
            !empty($_REQUEST['passwd']) &&
            !empty($_REQUEST['passwd2']) &&
            !empty($_REQUEST['phone'])
        ) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $passwd1 = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_STRING);
            $passwd2 = filter_input(INPUT_POST, 'passwd2', FILTER_SANITIZE_STRING);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
            if ($passwd1 == $passwd2) {

                $passwdhash = password_hash($passwd1, PASSWORD_ARGON2I);
                try {
                    $user = $this->create_user($email, $passwdhash, $phone);
                    header('location:/user/login');
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            } else {
                $this->error("Password does not match");
            }
        }
        $this->error("Fill the form");
    }

    public function destroy(){
        session_destroy();
        header('location:/');
    }

    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}