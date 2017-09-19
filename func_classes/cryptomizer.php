<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cryptomizer
 *
 * @author mekky
 */
class cryptomizer {
    private static $encPass = "cryptomizer";
    private static $encMethod = "AES-256-CBC";
    ////////////////////////////////////////////////////////////////////////////
    private  function __construct() {}
    ////////////////////////////////////////////////////////////////////////////
    public static function setEncryptionKey($key = "cryptomizer"){
        cryptomizer::$encPass = $key;
    }
    ////////////////////////////////////////////////////////////////////////////
    public static function setEncryptionMethod($method = "AES-256-CBC"){
        cryptomizer::$encMethod = $method;
    }
    ////////////////////////////////////////////////////////////////////////////
    public static function disguise($data_to_encrypt, $unique_flag = ""){
        return @openssl_encrypt($data_to_encrypt, cryptomizer::$encMethod, cryptomizer::$encPass, 0, $unique_flag);
    }
    ////////////////////////////////////////////////////////////////////////////
    public static function reveal($data_to_decrypt, $unique_flag = ""){
        return @openssl_decrypt($data_to_decrypt, cryptomizer::$encMethod, cryptomizer::$encPass, 0, $unique_flag);
    }
    ////////////////////////////////////////////////////////////////////////////
    public static function vanish($password, $algorithm = PASSWORD_DEFAULT){
        return password_hash($password, $algorithm);
    }
    ////////////////////////////////////////////////////////////////////////////
    public static function verify($password, $vanished_password){
        return password_verify($password, $vanished_password);
    }
    ////////////////////////////////////////////////////////////////////////////
}
