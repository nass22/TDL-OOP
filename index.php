<?php
//Permet de display les erreurs
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('controller/controller.php');

//DATETIME SETTINGS
date_default_timezone_set('Europe/Paris');

$date1 = date('d-m-y G:i:s');
$finish1 = 0;

try{
    if (isset($_GET['action'])){
        if ($_GET['action'] == 'addToDo'){
            addToDo($_POST['todo'], $date1, $finish1);
        } elseif ($_GET['action']== 'truncate'){
            allDelete();
        } else {
            throw new Exception("ERROR: un problème est survenu!");
        }
    } elseif (isset($_GET['id'])){
        if (!empty($_GET['id'])){
            deleteLine($_GET['id']);
        } else {
            throw new Exception("Impossible de supprimer le todo");
        }

    } else {
        addGetToDo();
    }
} catch(Exception $e){
    echo "Erreur: " . $e->getMessage();
}