<?php

function db_connect($database, $port = 3306){
    $connection = mysqli_connect(localhost, root,'',$database, $port);

    if(mysqli_connect_errno())
        die (mysqli_connect_error());

    return $connection;
}
function db_checkOrDie($connection){
    if (!$connection || mysqli_errno($connection))
        die (mysqli_error($connection));

}

function db_getConnectionFromTable($table){
    $table = explode('.', $table);
    //подключение к базе
    return db_connect($table[0] ?? '');
}

function db_getTable($table){
    return explode('.', $table)[1] ?? '';
}

function db_escapeData($data, $connection){
    if(!is_bool($data) && !is_null($data))
        $data = mysqli_real_escape_string($connection, $data);
    if(is_numeric($data))
        return $data;
    elseif (is_bool($data))
        return $data ? 1: 0;
    elseif (is_null($data))
        return 'NULL';
    elseif (is_string($data))
        return"'$data'";
    else
        die ("Incorrect \$value -> $data");

}

function db_select($table,$cols ="*", array $where =[]){
    // если - массив - делаем строкой через запятую
    if(is_array($cols))
        $cols = implode(',',$cols);
// разделяем базу и таблицу
    $connection = db_getConnectionFromTable($table);
    // берем имя таблицы
    $table = db_getTable($table);
    // базовый запрос
    $query = "SELECT $cols from `$table`";
// если есть where
    if (count($where)> 0) {
        $query .= "WHERE";
        foreach ($where as $col => $value){
            $query .= " $col = " . db_escapeData($value, $connection);
        }
    }

    $result = mysqli_query($connection, $query);
    db_checkOrDie($connection);

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($connection);

    return $rows;

}

function db_insert($table, array $data){
    $connection = db_getConnectionFromTable($table);
    $table = db_getTable($table);

    $cols = array_keys($data);
    $cols = implode(',', $cols);

    $values = array_map(function ($item) use ($connection){
        return db_escapeData($item, $connection);
    }, $data);
    $values = implode(',', $values);
    $query = "INSERT INTO $table ($cols) VALUES ($values)";

    $result = mysqli_query($connection, $query);

    //var_dump()

    if($result == false)
            db_checkOrDie($connection);

    mysqli_close($connection);

}

function db_update($table, array $where, array $data){
    $connection = db_getConnectionFromTable($table);
    $table = db_getTable($table);

    $cols = array_keys($data);
    $cols = implode(',', $cols);

    $values = array_map(function ($item) use ($connection){
        return db_escapeData($item, $connection);
    }, $data);
    $values = implode(',', $values);
    $colsvalues = implode(',', $values);
    $query = "UPDATE $table SET $cols = $values" ;

    if (count($where)> 0) {
        $query .= " WHERE";
        foreach ($where as $col => $value){
            $query .= " $col = " . db_escapeData($value, $connection);
        }
    }

    $result = mysqli_query($connection, $query);

    var_dump($query);

    if($result == false)
        db_checkOrDie($connection);

    mysqli_close($connection);
}

function db_delete($table, array $where){

}
