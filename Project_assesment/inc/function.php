<?php


function inputData($input=[''])
{
    include 'connection.php';
    $sql ='INSERT INTO robotic(nama,jurusan,email) VALUES(?,?,?)';

    $result=$db->prepare($sql);                                                                                                 
    $result->bindValue(1, $input['nama'], PDO::PARAM_STR);
    $result->bindValue(2, $input['jurusan'], PDO::PARAM_STR);
    $result->bindValue(3, $input['email'], PDO::PARAM_STR);
    $result->execute();
}

function deleteData($delete) {

    include 'connection.php';
    $sql = 'DELETE FROM robotic WHERE id = ?';
    try {
        $result = $db->prepare($sql);
        $result->bindValue(1, $delete['id'], PDO::PARAM_INT);
        $result->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

function edit($edit) {
    
    include 'connection.php';

    $sql="UPDATE robotic set nama = ?, jurusan = ?, email = ? WHERE id= ?";

    $result=$db->prepare($sql);
    $result->bindValue(1, $edit['nama'], PDO::PARAM_STR);
    $result->bindValue(2, $edit['jurusan'], PDO::PARAM_STR);
    $result->bindValue(3, $edit['email'], PDO::PARAM_STR);
    $result->bindValue(4, $edit['id'], PDO::PARAM_INT);
    $result->execute();

}

function comand($query)
{
    include 'connection.php';

    global $db;
    $result = $db->query($query);
    $rows=[];
    while($row=$result->fetch(PDO::FETCH_ASSOC))
    {
        $rows[]=$row;
    }
    return $rows;
}

function searching($keyword){
    $query="SELECT * FROM robotic WHERE nama LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR email LIKE '%$keyword%' ";
    return comand($query);
}

