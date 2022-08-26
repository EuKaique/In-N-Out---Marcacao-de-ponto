<?php

loadModel("User");

class Login extends User
{
    public function checkLogin(){
        $user = new User::getOne(['email' => $this->email]);

        if($user){
            if(password_verify($this->password, $user->password)){
                return $user;
            }
        }else{
            throw new Exception();
        }

        
    }
}