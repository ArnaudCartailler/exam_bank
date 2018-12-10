<?php

declare(strict_types = 1);

class Account
    {

        protected   $id,
                    $name,
                    $balance,
                    $id_users;

    const OVERDRAFT = 1;

    /**
     * constructor
     *
     * @param array $array
     */

    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    /**
     * Hydratation
     *
     * @param array $donnees
     */

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            if (is_string($key)) 
            {
                $method = 'set'.ucfirst($key);
            }
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }


    /**
     * Add money on the target account
     *
     * @param int $balance
     * @return void
     */

    public function addMoney($balance)
    {
        $balance = (int) $balance;

        $balance = $this->getBalance() + $balance;

        return $this->setBalance($balance);
    }

    /**
     * Pull Money on the target account
     *
     * @param int $balance
     * @return void
     */

    public function pullMoney($balance)
    {
        $balance = (int) $balance;

        $balance = $this->getBalance() - $balance;

        return $this->setBalance($balance);
    }

    /**
     * Transfer money of an account to an other
     *
     * @param Account $user
     * @param int $balance
     * @return void
     */
    public function transferMoney(Account $user, $balance)
    {
        $balance = (int) $balance;

        $addMoney = $user->getBalance() + $balance;

        $this->removeMoney($balance);

        return $user->setBalance($addMoney);

    }
    
    public function removeMoney($balance)
    {
        $balance = (int) $balance;

        $removeMoney = $this->getBalance() - $balance;

        return $this->setBalance($removeMoney);
    
    }

    /**
     * SETTERS
     */
    
     /**
      * Set ID
      *
      * @param int $id
      * @return self
      */

       public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0)
        {
            $this->id = $id;
        }

        return $this;
    }

     /**
     * Set the value of idAccount
     *
     * @return  self
     */

    public function setIdUsers($id_users)
    {
        $id_users = (int) $id_users;

        $this->id_users = $id_users;

        return $this;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
     public function setName(string $name)
    {
        if (is_string($name))
        {
            $this->name = $name;
        }

        return $this;
    }
    
    /**
     * Set balance
     *
     * @param int $balance
     * @return void
     */
      public function setBalance($balance)
    {
        $balance = (int) $balance;
        $this->balance = $balance;
        return $this->balance;
    }

    /**
     * GETTERS
     */

    /**
     * Get the value of the id
     *
     */
        public function getId()
    {
        return $this->id;
    }


    /**
     * Get the name
     *
     */
       public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of the balance
     *
     */
       public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Get the value of users id
     */
    public function getIdUsers()
    {
        return $this->id_users;
    }

}
