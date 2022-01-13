<?php
require_once('model/todoManager.php');

function addToDo($todo, $date, $finish){
    $todoManager=new TodoManager();
    $affectedLines = $todoManager->addToDoDb($todo, $date, $finish);
    
    if ($affectedLines === false) {
        throw new Exception("Impossible d\'ajouter le todo");
    } else {
        echo 'Todo ajouté!';
        header('Location:index.php');
    }
}

function addGetToDo(){
    $todoManager=new TodoManager();
    $resp=$todoManager->getToDo();
    require('view/indexView.php');
}

function deleteLine($id){
    $todoManager=new TodoManager();
    $resp=$todoManager->deleteToDo($id);
    echo "Todo supprimé";
    header("Location: index.php");
}

function allDelete(){
    $todoManager=new TodoManager();
    $resp=$todoManager->deleteTable();
    echo "Table vidée";
    header("Location: index.php");
}
