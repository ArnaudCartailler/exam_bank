<?php

declare(strict_types = 1);

class UserManager
{

    private $_db;

    /**
     * constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of _db
     */ 
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @param PDO $db
     * @return  self
     */ 
    public function setDb(PDO $db)
    {
        $this->_db = $db;
        return $this;
    }


    /**
     * Add new User
     *
     * @param User $user
     * @return self
     */
    public function addUser(User $user)
     {
        $req = $this->getDb()->prepare('INSERT INTO users(name, email, pass) VALUES(:name, :email, :pass)');
        $req->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $req->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':pass', $user->getPass(), PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * get User by email
     *
     * @param string $email
     * @return void
     */

     public function getUserByEmail(string $email)
    {
        $user;
        $req = $this->getDb()->prepare('SELECT * FROM users WHERE email = :email');
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $takeAllBdd = $req->fetchAll();
        foreach ($takeAllBdd as $oneUser) {
            $user = new User($oneUser);
        }
        return $user;
    }

      /**
     * Check if user exists or not
     *
     * @param string $name
     * @return boolean
     */
    public function checkIfExist(string $email)
    {
        $query = $this->getDb()->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue('email', $email, PDO::PARAM_STR);
        $query->execute();
        // Si il y a une entrée avec ce nom, c'est qu'il existe
        if ($query->rowCount() > 0)
        {
            return true;
        }
        
        // Sinon c'est qu'il n'existe pas
        return false;
    }

    /**
     * get all Users
     *
     * @return self
     */
    public function getUsers()
    {
        $users = [];
        $req = $this->getDb()->prepare('SELECT * FROM users ORDER BY id DESC');
        $req->execute();
        $takeAllDb = $req->fetchAll();
        foreach ($takeAllDb as $allUsers) {
            $users[] = new User($allUsers);
        }
    return $users;
    }


}
