<?php

/**
 * doctrine2 example
 * @author Erick Bosco
 * @Entity @Table(name="users")
 */
class User {
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    private $id;
    
    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $username;
    
    /**
     * @Column(type="string", length=255)
     * @var string
     */
    private $password;
	
	public function getId() {
        return $this->id;
    }
    public function setId($username) {
        $this->id = $id;
    }
	
	public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
	
	public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
}
