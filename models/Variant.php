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

?>