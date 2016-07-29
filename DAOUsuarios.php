<?php

class DAOUsuarios {
    public static $instance;

    private static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost:3306;dbname=info_voluntario', 'infovoluntario', 'info voluntario', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }
    
    // Retorna JSON
    public static function listarUsuarios() {
        try {          
            $sql = "SELECT * FROM USUARIOS ORDER BY NOME;";
            $consulta = DAOUsuarios::getInstance()->prepare($sql);                        
            $consulta->execute();
            $linhas = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $linhas;
        } catch (Exception $e) {
            print "Erro : " . $e->getMessage();
        }
    }  
    
    public static function cadastraUsuario($nome, $sobrenome){
        try {          
            $sql = "INSERT INTO USUARIOS(NOME, SOBRENOME) VALUES(:NOME, :SOBRENOME);";
            $consulta = DAOUsuarios::getInstance()->prepare($sql);                        
            $consulta->bindParam(':NOME', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':SOBRENOME', $sobrenome, PDO::PARAM_STR);
            $res = $consulta->execute();            
            return $res;
        } catch (Exception $e) {
            print "Erro : " . $e->getMessage();
        }
    }  
}
