<?php

/* 
 * Active Record pattern example
 * 
 * @author Erick Bosco
 */

class User {
    
    protected $db;
    
    private $id;
    private $username;
    private $password;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    public function getUsername() {
        return $this->username;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    public function getPassword() {
        return $this->password;
    }
    
    public function save() {
        if (empty($this->id)) {
            $statement = $this->db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
            $statement->bindParam('username', $this->username);
            $statement->bindParam('password', $this->password);
            $statement->execute();
            $this->id = $this->db->lastInsertId();
        } else {
            $statement = $this->db->prepare('UPDATE users SET username =:username, password = :password WHERE id = :id');
            $statement->bindParam('id', $this->id);
            $statement->bindParam('username', $this->username);
            $statement->bindParam('password', $this->password);
            $statement->execute();
        }
    }

}
