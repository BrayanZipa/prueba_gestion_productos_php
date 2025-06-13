<?php
    include 'conexion.php';

    if (isset($_GET['sku'])) {
        $sku = mysqli_real_escape_string($con, $_GET['sku']);
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        
        $query = "SELECT id FROM productos WHERE sku = '$sku'";
        if ($id > 0) {
            $query .= " AND id != $id";
        }
        $query .= " LIMIT 1";

        $result = mysqli_query($con, $query);

        echo (mysqli_num_rows($result) > 0) ? 'existe' : 'libre';
    }
?>
