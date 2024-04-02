<?php

if (!function_exists('checkUniqueEmail')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueEmail($tableName, $email) {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmailForUpdate')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueEmailForUpdate($tableName, $id, $email) {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getUserAdminByEmailAndPassword')) {
    function getUserAdminByEmailAndPassword($email, $password)
    {
        $email_or_user = $email;
        $isEmail = strpos($email_or_user, '@') !== false;
        if ($isEmail) {
            $sql = "SELECT * FROM taikhoan WHERE email = :email AND pass = :password AND role = 1 LIMIT 1";
        } else {
            $sql = "SELECT * FROM taikhoan WHERE user = :user AND pass = :password AND role = 1 LIMIT 1";
        }
        try {

            $stmt = $GLOBALS['conn']->prepare($sql);

            //            $stmt->bindParam(":email", $email);
            //            $stmt->bindParam(":password", $password);
            if ($isEmail) {
                $stmt->bindParam(":email", $email_or_user);
            } else {
                $stmt->bindParam(":user", $email_or_user);
            }
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;

        } catch (\Exception $e) {
            debug($e);
        }
    }
}

function get_id_name_dm()
{
    try {
        $sql = "SELECT * FROM danhmuc";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (\Exception $e) {
        die($e->getMessage());
    }

}