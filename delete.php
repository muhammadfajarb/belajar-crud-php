<?php
    include('config.php');

    $result = mysqli_query($conn, 'DELETE FROM tugas WHERE id="'.$_GET['id'].'"');

    header('Location: index.php');
?>