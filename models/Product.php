<?php 
    
    function selectAllProduct() {

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

    function selectOneProduct($id) {

        try {
            $sql = " select * from sanpham where id = :id ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    function select6Product() {

        try {
            $sql = " SELECT TOP 3 * FROM sanpham ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
   
   

?>