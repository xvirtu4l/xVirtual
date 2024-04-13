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
            $sql = "SELECT * FROM variant WHERE id_pro = :id_pro AND quantity > 0 ORDER BY var_id ASC LIMIT 1";
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

// select theo category
function selectAllProductPhantrangCategory($limit, $initial_page, $id)
{
    try {
        $sql = 'select * from sanpham where iddm = :iddm LIMIT :limit  OFFSET :offset';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':iddm', $id, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $initial_page, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// chia page co category
function getTotalPageProductCategory($id) {
    
    try {
        $sql = 'select COUNT(*) FROM sanpham where iddm = :iddm';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':iddm', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

//top6 
function top8Product() {
    try {
        $sql = 'select * from sanpham LIMIT 8';
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

function selectAllCommentsByID($id) {
    try {
        $sql = "SELECT 
                bl.id            as bl_id,
                bl.idpro         as bl_idpro,
                bl.iduser        as bl_iduser,
                bl.noidung       as bl_noidung,
                bl.ngaybinhluan  as bl_ngaybinhluan,
                sp.name          as bl_sanpham,
                tk.user          as bl_username
                FROM binhluan as bl
                INNER JOIN sanpham   as sp    ON bl.idpro    = sp.id
                INNER JOIN taikhoan      as tk   ON bl.iduser   = tk.id
        WHERE bl.idpro = :id";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// 