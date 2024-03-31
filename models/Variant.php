<?php 
    function selectAllVariants() {

        try {
            $sql = " select * from variant ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    

    function selectProductVariant($id) {

        try {
            $sql = " select * from variant where id_pro = :id ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


?>