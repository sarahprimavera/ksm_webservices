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

    public function getUserByApiKey($apikey)
    {
        $this->db->query("SELECT * FROM user WHERE api_key = :api_key");
        $this->db->bind(':api_key', $apikey);
        return $this->db->getSingle();
    }

    public function createUser($data)
    {
        $this->db->query('INSERT INTO user(name, phone_num, email, pass_hash, api_key) VALUES (:name, :phone, :email, :pass_hash, :api_key)');
        $this->db->bind('name', $data['username']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('pass_hash', $data['pass_hash']);
        $this->db->bind('api_key', $data['api_key']);

        return $this->db->execute();
    }

    public function updateUser($data)
    {
        $this->db->query("UPDATE user SET name=:name, phone_num=:phone, email=:email WHERE api_key=:api_key");
        $this->db->bind(':name', $data['user']);
        $this->db->bind(':phone', $data['num']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':api_key', $data['api']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
