<?php

function deleteOneCart($id){
    try {
        $sql = "DELETE FROM cart WHERE id_cart = :id";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


?>