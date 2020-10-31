<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=extra","root","",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
$siswa=$db->query("select * from robotic");
$data=$siswa->fetchAll();