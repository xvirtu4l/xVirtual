<?php
function show_all_products_in_card() {
    try {
        $sql =  "SELECT c.id_cart, sp.name, sp.img, v.price, c.soluong, c.tong_tien, c.ship, c.tien_phai_tra, v.var_id
                    FROM cart c
                    JOIN variant v ON c.id_var = v.var_id
                    JOIN sanpham sp ON v.id_pro = sp.id";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

    function allcart()
    {
        try {
            $sql = "SELECT * FROM cart";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
}
//    function addToCart($id_var, $soluong, $tong_tien, $ship, $tien_phai_tra)
//    {
//        try {
//            $sql = "INSERT INTO cart (id_var, soluong, tong_tien, ship, tien_phai_tra) VALUES (:id_var, :soluong, :tong_tien, :ship, :tien_phai_tra)";
//            $stmt = $GLOBALS['conn']->prepare($sql);
//            $stmt->bindParam(':id_var', $id_var, PDO::PARAM_INT);
//            $stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
//            $stmt->bindParam(':tong_tien', $tong_tien);
//            $stmt->bindParam(':ship', $ship);
//            $stmt->bindParam(':tien_phai_tra', $tien_phai_tra);
//            $stmt->execute();
//            return $GLOBALS['conn']->lastInsertId();
//        } catch (PDOException $e) {
//            die($e->getMessage());
//        }
//
//    }
    function deleteCartItem($id_cart)
    {
        try {
            $sql = "DELETE FROM cart WHERE id_cart = :id_cart";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_cart', $id_cart, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    ?>