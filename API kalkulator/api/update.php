<?php

include "../config/koneksi.php";

$id = @$_POST['id'];
$angka_1 = @$_POST['angka_1'];
$angka_2 = @$_POST['angka_2'];
$simbol = @$_POST['simbol'];
$hasil = @$_POST['hasil'];

$data = [];

$query = mysqli_query($kon, "UPDATE `daftar_infak` SET
`id`='". $id."',
`angka_1` = '". $angka_1."',
`angka_2` = '". $angka_2."',
`simbol` = '". $simbol."',
`hasil` = '". $hasil."',
WHERE  `id` = '". $id ."'");

if($query){
    $status = true;
       $pesan = "request success";
       $data[]= $query;
}else{
    $status = false;
    $pesan = "request failed";
}

$json = [
   "status" => $status,
   "pesan" => $pesan,
   "data" => $data,
];

header("Content-Type: application/json");
echo json_encode($json);

?>