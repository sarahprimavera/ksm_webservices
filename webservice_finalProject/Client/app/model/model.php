<?php

class model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createUser($username, $password, $phone, $email){
        $this->query('INSERT INTO user(name, phone_num, email, password) VALUES (:name, :password, :email, :phone)');
        $this->bind('name', $username);
        $this->bind('password', $password);
        $this->bind('email', $email);
        $this->bind('phone', $phone);

        return $this->execute();
    }

}