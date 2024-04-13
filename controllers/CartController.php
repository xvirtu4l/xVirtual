<?php
//require_once PATH_MODEL . 'cart.php';
function cartIndex()
{

    $view = 'cart';
//    $userIn = getIdUser();
//    var_dump($_SESSION['user']['id']);

    require_once PATH_VIEW . 'layouts/master.php';
}


function cartDelete()
{
    $id = $_GET['id'];

    deleteOneCart($id);
    header("location: " .BASE_URL . '?act=cart');
}

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



    function cartSessionDelete(): void
    {
        $var_id = $_GET['id_var'];
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $index => $item) {
                if ($item['id_var'] === $var_id) {
                    unset($_SESSION['cart'][$index]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    break;
                }
            }
        }
        header("location: " .BASE_URL . '?act=cart');
    }