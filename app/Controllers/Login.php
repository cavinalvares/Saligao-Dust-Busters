<?php
namespace App\Controllers;

use Config\App;

session_start();

class Login extends BaseController
{
    public function index()
    {
        $req = $this->request->getVar();

        $model = model(GarbageModel::class);

        $data['users'] = $model->getUsers($req['uname'], $req['psw']);
         
        if(!empty($data['users']))
        {
            if($req["check"] == "true"){
                //$hash = md5($req['uname'].$req['psw']);
                $hash = md5($data['users']['display_name'].rand(1, 2**48).rand(1, 2**48).rand(1, 2**48));
                setcookie("session", $hash, time()+(30*60), "/");
                $model = model(GarbageModel::class);
                $model->remember($data['users']['display_name'], $hash);
                /*
                $data = array(
                    'hash' => 'hash'
                );
                echo $model->upddata($data);
                */
            }
            else{
                $model = model(GarbageModel::class);
                $model->remember($data['users']['display_name'], "");
            }
            $_SESSION['username'] = $data['users']['display_name'];
            $_SESSION['mode'] = $data['users']['mode'];
        }
        else
            echo "0";
    }
    
    public function verify(){
        $model = model(GarbageModel::class);
        $data = $model->getAll();
        if(!empty($data))
        {
            foreach($data as $record){
                if(md5($record['display_name'].$record['password']) == $record['hash'])
                    $_SESSION["username"] = $record['display_name'];
                    setcookie("username", $record['hash'], time()+(30*60), "/");
            }
        }
        
        return view('dust_busters/initial');
    }

    public function duplicateUser(){

        $req = $this->request->getVar();

        $model = model(GarbageModel::class);

        $data['users'] = $model->getUsers($req['uname']);
         

        if(!empty($data['users']))
                echo "*The Username Already Exists*";
            else
                echo "";
    }

    public function signUp(){
        $name = $_POST["fname"]." ".$_POST["lname"];
        $username = $_POST["uname"];
        $phno = $_POST["phno"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $psw = $_POST["psw"];
              
        $model = model(GarbageModel::class);
        
        $model->save([
            'name' => $name,
            'display_name' => $username,
            'phone_no' => $phno,
            'email' => $email,
            'address' => $address,
            'password' => $psw,
            'mode' => 0,
            'session' => "",
        ]);        
        
        $_SESSION['username'] = $username;
        $_SESSION['mode'] = 0;
        echo "<script>window.open('/', '_self')</script>";
    }

    public function forgot(){
        
        $req = $this->request->getVar();

        $model = model(GarbageModel::class);

        $data['users'] = $model->getUsers($req['uname']);

        $_SESSION['otp'] = rand(100000, 999999);
        $_SESSION['time'] = time();

        $from = "Had3sInc@gmail.com";
        $to = "alvarescavin19@gmail.com"; 
        $subject = "verify-account-otp";
        $message = strval($_SESSION['otp']);
        $headers = "From:" .$from;


        if(!mail($to, $subject, $message, $headers)){
            echo "fail";
        }
        else
        {
            echo "pass";
        }
    }

    public function logout(){
        if(isset($_COOKIE['session']))
        {
            $model = model(GarbageModel::class);
            $model->remember($_SESSION['username'], "");
            setcookie("session", "", time()-3600, "/");
                
        } 
        unset($_SESSION['username']);
        echo "<script>window.open('/', '_self')</script>";
    }
}
