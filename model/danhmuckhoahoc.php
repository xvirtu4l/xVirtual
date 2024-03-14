<?php


function loadall_dmkhoahoc(){
    $sql = "SELECT * FROM danhmuckhoahoc";
    $list_dm = pdo_query($sql);
    return $list_dm;
}