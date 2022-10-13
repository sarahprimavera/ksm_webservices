<?php

class model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($email){
        $this->query("SELECT * FROM user WHERE email = :email");
        $this->bind(':email',$email);
        return $this->getSingle();
    }

    public function createUser($data){
        $this->query('INSERT INTO user(name, phone_num, email, password) VALUES (:name, :password, :email, :phone)');
        $this->bind('name', $data['username']);
        $this->bind('password', $data['password']);
        $this->bind('email', $data['email']);
        $this->bind('phone', $data['phone']);

        return $this->execute();
    }

}