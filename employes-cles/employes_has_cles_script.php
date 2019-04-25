<?php
require '../database/database.php';
session_start();
$response = $db->query('SELECT e.id, e.name, e.firstname, c.numero_cle 
                        FROM `cle_employee` ce 
                        LEFT JOIN employees e 
                        ON (e.id = ce.id_employee) 
                        LEFT JOIN cle c 
                        ON (c.id = ce.id_cle)');

$employeHasCles = $response->fetchAll(PDO::FETCH_ASSOC);

?>
