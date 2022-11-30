<?php
require_once dirname(__DIR__) . '/core/Model.php';
class clientModel
{
    public function __construct()
    {
        $this->db = new Model();
    }

    public function getUser($email)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->getSingle();
    }

    public function createUser($data)
    {
        $this->db->query('INSERT INTO user(name, phone_num, email, password, pass_hash) VALUES (:name, :phone, :email, :password, :pass_hash)');
        $this->db->bind('name', $data['username']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('pass_hash', $data['pass_hash']);

        return $this->db->execute();
    }
}
