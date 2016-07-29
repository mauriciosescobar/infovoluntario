<?php

require_once 'DAOUsuarios.php';                        

$result_set = DAOUsuarios::listarUsuarios();         

header('Content-type: application/json');

$json = json_encode($result_set);

// $json = json_encode($result_set);

echo $json;
