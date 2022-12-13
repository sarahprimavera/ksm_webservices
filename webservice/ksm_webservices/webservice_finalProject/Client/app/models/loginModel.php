<?php

class loginModel
{

    /*
     * Default constructor of LoginModel class
     */
    public function __construct()
    {
        $this->db = new Model;
    }

    /*
     * Retrieves a user from the database based on the username
     */
    public function getUser($username)
    {
        $this->db->query("SELECT * FROM user WHERE name = :username");
        $this->db->bind(':username', $username);

        return $this->db->getSingle();
    }

    /*
     * Creates a new user to the database based on the given data
     */
    public function createUser($data)
    {
        $this->db->query("INSERT INTO user (name, phone_num, email, pass_hash) values (:username, :phone_num, :email, :pass_hash)");
        // Valeur dans la view
        $this->db->bind(':username', $data['name']);
        $this->db->bind(':phone_num', $data['phone_num']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':pass_hash', $data['pass_hash']);

        return $this->db->execute();
    }
}
