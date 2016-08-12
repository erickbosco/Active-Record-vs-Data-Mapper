<?php

/* 
 * doctrine2 example
 * 
 * @author Erick Bosco
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;
}
