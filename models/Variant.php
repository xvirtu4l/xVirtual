<?php 
    function selectAllVariants($id = null) {
        try {
            $sql = "SELECT * FROM variant";
            if ($id !== null) {
                $sql .= " WHERE id_pro = :id";
            }
            $stmt = $GLOBALS['conn']->prepare($sql);
            if ($id !== null) {
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            }
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectDistinctStorage($id) {
        try {
            $sql = "SELECT DISTINCT storage FROM variant WHERE id_pro = :productId";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':productId', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    function selectDistinctColors($id) {
        try {
            $sql = "SELECT DISTINCT color FROM variant WHERE id_pro = :productId";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':productId', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    function OutofStock($id) {
        try {
            $sql = "SELECT DISTINCT color FROM variant WHERE id_pro = :productId AND quantity <= 0";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':productId', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


?>