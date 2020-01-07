<?php

// Функция подсчитывает количество элементов в таблице

function getEntryNumber($table, $pdo){
    $countRaw = $pdo->query("select count(*) as total from $table");
    $data = $countRaw->fetch();
    return $data['total'];
}
