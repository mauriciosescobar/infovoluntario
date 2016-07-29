<?php

require_once 'DAOUsuarios.php';                        

$nome       = $_POST["nome"];
$sobrenome  = $_POST["sobrenome"];

$success = DAOUsuarios::cadastraUsuario($nome, $sobrenome);

echo $success;
