<?php

/* 
 * Data Mapper pattern example
 * 
 * @author Erick Bosco
 */

class UserDAO {
    
    protected $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    public function save(User $user) {
        if (empty($user->id)) {
            $statement = $this->db->prepare('INSERT INTO user (username, password) VALUES (?, ?)');
            $statement->bindValue(1, $user->getUsername());
            $statement->bindValue(2, $user->getPassword());
            $statement->execute();
            return $this->db->lastInsertId();
        } else {
            $statement = $this->db->prepare('UPDATE user SET username = ?, password = ? WHERE id = ?');
            $statement->bindValue(1, $user->getUsername());
            $statement->bindValue(2, $user->getPassword());
            $statement->bindValue(3, $user->getId());
            $statement->execute();
            return $user->getId();
        }
    }

}
