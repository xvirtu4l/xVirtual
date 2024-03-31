<?php

function selectAllProduct()
{

    try {
        $sql = " select * from sanpham ";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function selectOneProduct($id)
{

    try {
        $sql = " select * from sanpham where id = :id ";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// function phân trang
function selectAllProductPhantrang($limit, $initial_page)
{
    try {
        $sql = 'select * from sanpham LIMIT :limit OFFSET :offset';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $initial_page, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function getTotalPageProduct() {
    
    try {
        $sql = 'select COUNT(*) FROM sanpham';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
