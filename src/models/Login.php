<?php

loadModel("User");

class Login extends User
{
    public function validate(){
        $errors = [];

        if(!$this->email){
            $errors['email'] = 'O campo e-mail é obrigatório';
        }

        if(!$this->password){
            $errors['password'] = 'A senha é obrigatória';
        }

        if(count($errors) > 0){
            throw new ValidationException($errors);
        }
    }

    public function checkLogin(){
        $this->validate();

        $user = User::getOne(['email' => $this->email]);

        if($user){
            if($user->end_date){
                throw new AppException('Usuário desligado da empresa.');
            }
            if(password_verify($this->password, $user->password)){
                return $user;
            }
        }
        throw new AppException('Usuário ou senha errada.');
        
    }
}