<?php

// On enregistre notre autoload.
function chargerClasse($classname)
{
    if(file_exists('../models/'. $classname.'.php'))
    {
        require '../models/'. $classname.'.php';
    }
    else 
    {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');

$db = Database::DB();

if(!empty($_POST['name'])){

    $name = htmlspecialchars($_POST['name']);

        if($name == "pel"){
            $AccountManager = new AccountManager($db);
                $newAccount = new Account([
                            'name' => $name,
                            'balance' => 80,
                                ]);
            $addAccount = $AccountManager->addAccount($newAccount);
            header('location: index.php');
        }elseif($name == "courant"){
            $AccountManager = new AccountManager($db);
                $newAccount = new Account([
                            'name' => $name,
                            'balance' => 80,
                                ]);
            $addAccount = $AccountManager->addAccount($newAccount);
            header('location: index.php');
        }elseif($name == "livret"){
            $AccountManager = new AccountManager($db);
                $newAccount = new Account([
                            'name' => $name,
                            'balance' => 80,
                                ]);
            $addAccount = $AccountManager->addAccount($newAccount);
            header('location: index.php');
        }elseif($name == "joint"){
            $AccountManager = new AccountManager($db);
                $newAccount = new Account([
                            'name' => $name,
                            'balance' => 80,
                                ]);
            $addAccount = $AccountManager->addAccount($newAccount);
            header('location: index.php');
        }
}


include "../views/indexView.php";
