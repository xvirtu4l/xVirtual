<?php


    function getVariantById($var_id)
    {
        try {
                $sql = "SELECT * FROM variant WHERE var_id = :var_id";
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->bindParam(':var_id', $var_id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function getFirstVariantByProductId($product_id)
    {
        try {
            $sql = "SELECT * FROM variant WHERE id_pro = :id_pro ORDER BY var_id ASC LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_pro', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
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

//top6 
function top6Product() {
    try {
        $sql = 'select * from sanpham LIMIT 6';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function selectAlldonhang($id) {
    try {
        $sql = "SELECT * FROM donhang WHERE id_checkout = :order_number";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':order_number', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}