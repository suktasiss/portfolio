<?php

// Скрипт отвечает за удаление столбцов из таблицы

require_once("../../includes/config.php");

if ($_POST['id'] && $_POST['table']) {

    $sql = "delete from " . $_POST['table'] ." WHERE id='" . $_POST['id'] . "';";  
    $pdo->query($sql);    
    $data = array(
        "message"   => "Record Deleted",    
        "status" => 1
    );
    echo json_encode($data);    
}
