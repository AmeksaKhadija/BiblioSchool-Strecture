<?php


class LoginForm{
    public string $email;
    public string $password;

    public static function instanceWithAllArgs(string $email,string $password){
        Message::in("InstanceWithAllArgs methode dans la classe LoginForm");
        $instance = new self();
        $instance->email = $email;
        $instance->password = $password;
        Message::in("ceci est une instance de la classe LoginFOM");
        var_dump($instance);
        return $instance;
    }

}