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

$AccountManager = new AccountManager($db);

/**
 * Add a account and hydrate with 80€
 */
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

/**
 * Can add money on the account you chose
 */
if (isset($_POST['payment'])) 
{
    if (isset($_POST['id'])) 
    {
        if (isset($_POST['balance'])) 
        {
            $payment = htmlspecialchars($_POST['payment']);

            $getId = htmlspecialchars($_POST['id']);

            $balance = htmlspecialchars($_POST['balance']);

            $getAccount = $AccountManager->getAccountById($getId);

            $addMoney = $getAccount->addMoney($balance);

            $AccountManager->update($getAccount);
        }
    }
}

/**
 * Can pull money
 */

if (isset($_POST['debit'])) 
{
    if (isset($_POST['id'])) 
    {
        if (isset($_POST['balance'])) 
        {
            $debit = htmlspecialchars($_POST['debit']);

            $getId = htmlspecialchars($_POST['id']);

            $balance = htmlspecialchars($_POST['balance']);

            $getAccount = $AccountManager->getAccountById($getId);

            $pullMoney = $getAccount->pullMoney($balance);

            $AccountManager->update($getAccount);
        }
    }
}

/**
 * Can delete an account
 */

if (isset($_POST['delete'])) 
{
    if (isset($_POST['id'])) 
    {

            $delete = htmlspecialchars($_POST['delete']);

            $getId = htmlspecialchars($_POST['id']);

            $getAccount = $AccountManager->getAccountById($getId);

            $AccountManager->deleteAccount($getAccount);
        }
    }

/**
 * Can transfer money
 */
if (isset($_POST['transfer'])) 
{
    if (isset($_POST['balance'])) 
    {
        if (isset($_POST['idDebit'])) 
        {
            if (isset($_POST['idPayment'])) 
            {
                $transfert = htmlspecialchars($_POST['transfer']);

                $balance = htmlspecialchars($_POST['balance']);

                $idDebit = htmlspecialchars($_POST['idDebit']);

                $idPayment = htmlspecialchars($_POST['idPayment']);

                if ($idPayment !== $idDebit) 
                {
                    $Giver = $AccountManager->getAccountById($idDebit);

                    $Recipient = $AccountManager->getAccountById($idPayment);

                    $Giver->transferMoney($Recipient, $balance);

                    $AccountManager->update($Giver);
                    
                    $AccountManager->update($Recipient);
                }
            }
        }
    }
}



$accounts = $AccountManager->getAccounts();

include "../views/indexView.php";
