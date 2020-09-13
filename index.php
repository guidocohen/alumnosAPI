<?php
    include_once 'apimodel.php';

    $db = new Database();

    $db->connect();

    $apimodel = new APIModel();

    $apimodel->getAll();
?>