<?php 
 
 function authlogin($email){
    try {
        $sql = 'select * from taikhoan where email = :email';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
 }

 function insertUser($user,$pass,$email,$address,$tel){
    try {
        $sql = 'insert into taikhoan (user,pass,email,address,tel) values (:user,:pass,:email,:address,:tel)';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':user',$user);
        $stmt->bindParam(':pass',$pass);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':tel',$tel);
        $stmt->execute();
        
    } catch (PDOException $e) {
        die($e->getMessage());
    }
 }
