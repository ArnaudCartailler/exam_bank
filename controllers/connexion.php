<?php

// Save our autoload.
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

$UserManager = new UserManager($db);

/**
 * Sign up / Add a user
 */

 if(isset($_POST['signup']))
 {
    if(!empty($_POST['name']))
    {
        if($_POST['pass'] == $_POST['pass2'])
        {
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
            {
                
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                        $UserManager = new UserManager($db);
                            $newUser = new User([
                                        'name' => $name,
                                        'email' => $email,
                                        'pass' => $pass
                                            ]);
                        $addUser = $UserManager->addUser($newUser);
                        header("URL=connexion.php");
            }
        }
    }
}

/**
 * Sign in to be connected to the account
 */

 if(isset($_POST[('signin')]))
 {

    $getEmail = htmlspecialchars($_POST['email']);

    $getPass = htmlspecialchars($_POST['pass']);
    
    $message ="";
        
        if(!$UserManager->checkIfExist($getEmail))
        {            
            $message = "Ce compte n'existe pas";
        }

        else
        {
            $user = $UserManager->getUserByEmail($getEmail);
            
             $isPasswordCorrect = password_verify($getPass, $user->getPass());

             if($isPasswordCorrect)
             {
                session_start();

                $_SESSION['user'] = $user;

                header("location: index.php");
        }
    }

 }

include "../views/connexionView.php";