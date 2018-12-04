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
    public function addAccount(Account $account)
     {
        $req = $this->getDb()->prepare('INSERT INTO accounts(name, balance) VALUES(:name, :balance)');
        $req->bindValue(':name', $account->getName(), PDO::PARAM_STR);
        $req->bindValue(':balance', $account->getBalance(), PDO::PARAM_INT);
        $req->execute();
    }


    /**
     * Delete account by id
     *
     * @param Account $account
     * @return self
     */
    public function deleteAccount(Account $account)
    {
        $this->getDb()->exec('DELETE FROM accounts WHERE id = '.$account->getId());
    }

    /**
     * get account by id
     *
     * @param integer $id
     * @return void
     */

     public function getAccountById(int $id)
    {
        $account;
        $req = $this->getDb()->prepare('SELECT * FROM accounts WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $takeAllBdd = $req->fetchAll();
        foreach ($takeAllBdd as $oneAccount) {
            $account = new Car($oneAccount);
        }
        return $account;
    }

    /**
     * get all accounts
     *
     * @return self
     */
    public function getAccounts()
    {
        $accounts = [];
        $req = $this->getDb()->prepare('SELECT * FROM accounts ORDER BY id DESC');
        $req->execute();
        $takeAllDb = $req->fetchAll();
        foreach ($takeAllDb as $allAccounts) {
            $accounts[] = new Account($allAccounts);
        }
    }

    /**
     * update account by id
     *
     * @param Account $account
     * @return self
     */
    public function update(Account $account)
    {
        $req = $this->getDb()->prepare('UPDATE accounts SET balance = :balance WHERE id = :id');
        $req->bindValue(':id', $account->getId(), PDO::PARAM_STR);
        $req->bindValue(':balance', $account->getBalance(), PDO::PARAM_INT);
        $req->execute();
    }

}
