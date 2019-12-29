<?php

// Функция подсчитывает количество элементов в таблице

function getEntryNumber($table, $con){
    $countRaw = mysqli_query($con,"select count(*) as total from $table");
    $data = mysqli_fetch_assoc($countRaw);
    return $data['total'];
}
