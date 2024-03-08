<?php

function loadall_khoahoc(){
    $sql = "SELECT kh.*, dm.ten_danh_muc FROM khoahoc AS kh 
    INNER JOIN danhmuckhoahoc AS dm ON dm.id_danh_muc = kh.id_danhmuc";
    $list_kh = pdo_query($sql);
    return $list_kh;
}

function insert_khoahoc($ten_khoa_hoc, $filename, $gia, $iddm){
    $sql = "INSERT INTO khoahoc (ten_khoa_hoc, hinh_anh, gia, id_danhmuc)
    VALUES ('$ten_khoa_hoc','$filename','$gia','$iddm')";
    pdo_execute($sql);
}

function loadone_khoahoc($id){
    $sql = "SELECT * FROM khoahoc WHERE id = '$id'";
    $khoahoc = pdo_query_one($sql);
    return $khoahoc;
}

function update_khoahoc($id, $ten_khoa_hoc, $filename, $gia, $iddm){
    if($filename !=""){
        $sql = "UPDATE khoahoc SET id_danhmuc='$iddm',ten_khoa_hoc = '$ten_khoa_hoc',gia='$gia',
                  hinh_anh='$filename' WHERE id = ".$id;
    }else {
        $sql = "UPDATE khoahoc SET id_danhmuc='$iddm',ten_khoa_hoc = '$ten_khoa_hoc',gia='$gia'
                   WHERE id = ".$id;
    }
    pdo_execute($sql);
}

function delete_khoahoc($id){
    $sql = "DELETE FROM khoahoc WHERE id=".$id;
    pdo_execute($sql);
}