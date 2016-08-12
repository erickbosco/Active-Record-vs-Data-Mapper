<?php

/*
 * Controller only for test patterns
 * 
 * @author Erick Bosco
 */

require_once "data-mapper/doctrine2/vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class GeneralController {

    private $db = null;
    private $entityManager = null;

    public function __construct() {
        /* free */
        $this->db = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", 'root', '');
        
        /* php active record */
        /*require_once 'active-record/php-activerecord/php-activerecord/ActiveRecord.php';
        ActiveRecord\Config::initialize(function($cfg)
        {
            $cfg->set_model_directory('active-record/php-activerecord');
            $cfg->set_connections(array(
                'development' => 'mysql://root:@localhost/test'));
        });*/
        
        /* doctrine 2 */
        $paths = array('path/entities');
        $isDevMode = true;

        // the connection configuration
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '',
            'dbname'   => 'test',
        );
        
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $this->entityManager = EntityManager::create($dbParams, $config);
        
        
        
        if (isset($_GET['action']) && method_exists($this, $_GET["action"])) {
            $this->$_GET["action"]();
        }
    }

    private function activeRecordFree() {
        require './active-record/free/User.php';

        $objUser = new User($this->db);
        $objUser->setUsername('user-' . __FUNCTION__);
        $objUser->setPassword('fail');
        
        $objUser->save();

        var_dump($objUser);
    }

    private function activeRecordPHPActiveRecord() {
        #not required currently
        require_once 'active-record/php-activerecord/User.php';
        
        #insert
        $user = User::create(array('username' => 'ebosco', 'password' => 'pass'));
        
        #query search / select
        $userFinder = User::find_by_username('ebosco');
        #update
        $userFinder->username = 'ebosco_changed';
        $userFinder->save();
        #delete
        $userFinder->delete();
        
        var_dump($user, $userFinder, $userFinder);
    }

    private function dataMapperFree() {
        require './data-mapper/free/User.php';
        
        $objUser = new User();
        $objUser->setUsername('user-' . __FUNCTION__);
        $objUser->setPassword('fail');
        
        require './data-mapper/free/UserDAO.php';
        
        $objUserMapper = new UserDAO($this->db);
        $id = $objUserMapper->save($objUser);
        
        $objUser->setId($id);
        
        var_dump($objUser);
    }

    private function dataMapperDoctrine() {
        $user = $this->entityManager->find('User', 1);
        var_dump($user);
    }

}
