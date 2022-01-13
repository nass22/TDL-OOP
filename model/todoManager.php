<?php 
require_once("model/Manager.php");

class TodoManager extends Manager{
    public function addToDoDb($todo,$date,$finish){
        $db=$this->dbConnect();
        $insert = $db->prepare('INSERT INTO todo(todo, date, modify, finish) VALUES (:todo, :date, null, :finish)');
        $insert->bindParam(':todo',$todo);
        $insert->bindParam(':date', $date);
        $insert->bindParam(':finish', $finish);
        $affectedLines=$insert->execute();
        return $affectedLines;
    }

    public function getToDo(){
        $db=$this->dbConnect();
        $sqlQuery = 'SELECT todo, id FROM todo ORDER BY date DESC';
        $stm=$db->query($sqlQuery);
        return $stm;
    }
    
    public function deleteToDo($id){
        $db=$this->dbConnect();
        $sqlQuery= 'DELETE todo FROM todo WHERE id=:id';
        $stm=$db->prepare($sqlQuery);
        $stm->bindParam(':id', $id);
        $stm->execute();
    }
    
    public function deleteTable(){
        $db=$this->dbConnect();
        $sqlQuery='TRUNCATE TABLE todo';
        $stm=$db->prepare($sqlQuery);
        $stm->execute();
    }

    
    
}