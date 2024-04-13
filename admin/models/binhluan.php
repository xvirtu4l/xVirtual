<?php 

if (!function_exists('listAllForBL')) {
    function listAllForBL() {
        try {
            $sql = "
                SELECT bl.id            as bl_id,
                       bl.idpro         as bl_idpro,
                       bl.iduser        as bl_iduser,
                       bl.noidung       as bl_noidung,
                       bl.ngaybinhluan  as bl_ngaybinhluan,
                       sp.name          as bl_sanpham,
                       tk.user          as bl_username
                FROM binhluan as bl 
                INNER JOIN sanpham as sp on bl.idpro = sp.id 
                INNER JOIN taikhoan as tk on bl.iduser = tk.id;
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showOneFromComments')) {
    function showOneFromComments($id) {
        try {
            $sql = "
                SELECT
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
                WHERE 
                    bl.id = :id 
                LIMIT 1
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('deleteCMTonProduct')) {
    function deleteCMTonProduct($id) {
        try {
            $sql = "DELETE FROM binhluan WHERE id = :id;";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}