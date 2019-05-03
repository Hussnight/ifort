<?php
require '../model/database.php';
session_start();

$response = $db->query('SELECT e.id, e.name, e.firstname, b.numero_badge 
                        FROM `badge_employee` be 
                        LEFT JOIN employees e 
                        ON (e.id = be.id_employee) 
                        LEFT JOIN badge b 
                        ON (b.id = be.id_badge)');

$employeHasBadges = $response->fetchAll(PDO::FETCH_ASSOC);

?>
