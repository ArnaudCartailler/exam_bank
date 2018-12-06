<?php

declare(strict_types = 1);

class User
    {

        protected   $id,
                    $name,
                    $email,
                    $pass;

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
     * Set email
     *
     * @param string $email
     * @return self
     */
     public function setEmail(string $email)
    {
        if (is_string($email))
        {
            $this->email = $email;
        }

        return $this;
    }

       /**
     * Set pass
     *
     * @param string $pass
     * @return self
     */
     public function setPass(string $pass)
    {
        if (is_string($pass))
        {
            $this->pass = $pass;
        }

        return $this;
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
     * Get the email
     *
     */
       public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the password
     *
     */
       public function getPass()
    {
        return $this->pass;
    }


}
