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



    function checkVoucherValidity($voucherCode)
    {
        try {
            $currentDateTime = new DateTime();
            //            var_dump($currentDateTime);
            $sql = "SELECT * FROM vouchers WHERE code = :voucherCode";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':voucherCode', $voucherCode);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $resultStartDate = new DateTime($result['start_date']);
                $resultEndDate = new DateTime($result['end_date']);
                if (($result['quantity'] > 0) && ($resultStartDate < $currentDateTime) && $currentDateTime < $resultEndDate ) {
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }



        } catch (Exception $e) {
            return false;
        }
    }
    function getdisValue($voucherCode)
    {
        try {
            $sql = "SELECT * FROM vouchers";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            $result =  $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['discount_value'];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function sshow_all_products_in_card() {
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

    function sshow_all_products_in_card_with_id_user($id_user) {
        try {
            $sql =  "SELECT c.id_cart, sp.name, sp.img,sp.id, v.price, c.soluong, c.tong_tien, c.ship, c.tien_phai_tra, v.var_id
            FROM cart c
            JOIN variant v ON c.id_var = v.var_id
            JOIN sanpham sp ON v.id_pro = sp.id
            WHERE c.id_user = :id_user";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    function mergeCartAndLogin($user_id) {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                addToCartDatabase($user_id, $item['id_var'], $item['soluong'], $item['tong_tien'], $item['ship'], $item['tien_phai_tra']);
            }
            unset($_SESSION['cart']);
        }
        $_SESSION['user']['id'] = $user_id;
    }

    function addToCartDatabase($user_id, $id_var, $soluong, $tong_tien, $ship, $tien_phai_tra) {
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM cart WHERE id_user = ? AND id_var = ?");
        $stmt->execute([$user_id, $id_var]);
        $existingItem = $stmt->fetch();

        if ($existingItem) {
            $stmt = $GLOBALS['conn']->prepare("UPDATE cart SET soluong = soluong + ?, tong_tien = tong_tien + ?, ship = ship + ?, tien_phai_tra = tien_phai_tra + ? WHERE id_user = ? AND id_var = ?");
            $stmt->execute([$soluong, $tong_tien, $ship, $tien_phai_tra, $user_id, $id_var]);
        } else {
            $stmt = $GLOBALS['conn']->prepare("INSERT INTO cart (id_user, id_var, soluong, tong_tien, ship, tien_phai_tra) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$user_id, $id_var, $soluong, $tong_tien, $ship, $tien_phai_tra]);
        }
    }

    function getCartItems($isLoggedIn)
    {
        if ($isLoggedIn) {
            mergeCartAndLogin($_SESSION['user']['id']);
            $carts = sshow_all_products_in_card_with_id_user($_SESSION['user']['id']);
            echo 'login';
            foreach ($carts as $key => $cart) {
                $carts[$key]['id_product'] = $cart['id_cart'];
            }
        } else {
            if (!session_id()) {
                session_start();
            }
            $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
            echo 'session';
            foreach ($carts as $key => $cart) {
                $carts[$key]['id_product'] = $cart['id_var'];
            }
        }

        return $carts;
    }



?>