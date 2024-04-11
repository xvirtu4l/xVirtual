<?php

function loadAllCategory(){
    try {
        $sql = 'select * from danhmuc';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}