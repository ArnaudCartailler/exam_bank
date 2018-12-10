<?php

declare(strict_types = 1);

class AccountManager
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
     * Add new Account
     *
     * @param Account $account
     * @return self
     */
    public function addAccount(Account $user)
     {
        $req = $this->getDb()->prepare('INSERT INTO accounts(name, balance, id_users) VALUES(:name, :balance, :id_users)');
        $req->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $req->bindValue(':balance', $user->getBalance(), PDO::PARAM_INT);
        $req->bindValue(':id_users', $user->getIdUsers(), PDO::PARAM_INT);
        $req->execute();
    }


    /**
     * Delete account by id
     *
     * @param Account $account
     * @return self
     */
    public function deleteAccount(Account $user)
    {
        $this->getDb()->exec('DELETE FROM accounts WHERE id = '.$user->getId().' and id_users = :id_users');
        $req->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $req->bindValue(':id_users', $id_users, PDO::PARAM_INT);
    }

    /**
     * get account by id
     *
     * @param integer $id
     * @return void
     */

     public function getAccountById(int $id, int $id_users)
    {
        $account;
        $req = $this->getDb()->prepare('SELECT * FROM accounts WHERE id = :id and id_users = :id_users');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':id_users', $id_users, PDO::PARAM_INT);
        $req->execute();
        $takeAllBdd = $req->fetchAll();
        foreach ($takeAllBdd as $oneAccount) {
            $account = new Account($oneAccount);
        }
        return $account;
    }

    /**
     * get all accounts
     *
     * @return self
     */
    public function getAccounts(int $id_users)
    {
        $accounts = [];
        $req = $this->getDb()->prepare('SELECT * FROM accounts WHERE id_users = :id_users');
        $req->bindValue(':id_users', $id_users, PDO::PARAM_INT);
        $req->execute();
        $takeAllDb = $req->fetchAll();
        foreach ($takeAllDb as $allAccounts) {
            $accounts[] = new Account($allAccounts);
        }
    return $accounts;
    }

    /**
     * update account by id
     *
     * @param Account $account
     * @return self
     */
    public function update(Account $user)
    {
        $req = $this->getDb()->prepare('UPDATE accounts SET balance = :balance WHERE id = :id and id_users = :id_users');
        $req->bindValue(':id', $account->getId(), PDO::PARAM_STR);
        $req->bindValue(':balance', $account->getBalance(), PDO::PARAM_INT);
        $req->bindValue(':id_users', $id_users, PDO::PARAM_INT);
        $req->execute();
    }

}
