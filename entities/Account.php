<?php

declare(strict_types = 1);

class Account
    {

        protected   $id,
                    $name,
                    $balance;

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
            
            $method = 'set'.ucfirst($key);
            
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }


    public function addMoney(Account $money){

        $this->balance += $money;

        return $balance;

    }

    public function pullMoney(Account $money){

        $this->balance -= $money;

            if ($this->balance < 0){
            
                 self::OVERDRAFT;
        }

        return $balance;

    }

    public function paymentMoney(){



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

}
