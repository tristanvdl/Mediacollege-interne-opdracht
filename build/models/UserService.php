<?php

class UserService
{
    private $db;
    private $email;
    private $password;
    private $user_level;

    public function __construct($db)
    {
        $this->db = $db;
        $this->email = isset($_POST['email']) ? $_POST['email'] : '';
        $this->password = isset($_POST['password']) ? hash('sha512',$_POST['password']) : '';
    }

    public function registerUser()
    {
        $statement = $this->db->prepare("INSERT INTO users(email,password) VALUES (:email,:password)");
        $statement->bindParam(':email',$this->email,PDO::PARAM_STR);
        $statement->bindParam(':password',$this->password,PDO::PARAM_STR);
        return $statement->execute() ? true : false;
    }

    function checkIfExist()
    {
        $statement = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindParam(':email',$this->email,PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }

    public function checkCredentialUser()
    {
        $statement = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password= :password");
        $statement->bindParam(':email',$this->email,PDO::PARAM_STR);
        $statement->bindParam(':password',$this->password,PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();
        $this->user_level = $result['user_level'];
        return $result;
    }

    public function loginUser()
    {
        $user =  array(
            $_SESSION['user'] = $this->email,
            $_SESSION['user_level'] = $this->user_level
        );
        return $user;
    }
}