<?php
    include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .input-form {
            margin-bottom: 10px;
        }

    </style>
</head>

<body>
    <h1>Halaman tambah data tugas</h1>

    <form method="POST" action="add.php">
        <div class="input-form">
            <label>Judul</label><br>
            <input type="text" name="judul">
        </div>
        <div class="input-form">
            <label>Deadline</label><br>
            <input type="date" name="deadline">
        </div>
        <div class="input-form">
            <label>Status</label><br>
            <select name="status">
                <option value="0">Belum dikerjakan</option>
                <option value="1">Sedang dikerjakan</option>
                <option value="2">Selesai</option>
            </select>
        </div>
        <div>
            <input type="submit" name="simpan" value="SIMPAN">
        </div>
    </form>

    <?php 
        if (isset($_POST['simpan'])) {
            
            $result = mysqli_query($conn, 'INSERT INTO tugas (judul, deadline, status) VALUES ("'. $_POST['judul']. '", "' . $_POST['deadline'] . '", "' . $_POST['status'] . '")');

            header('Location: index.php');
        }
    ?>
</body>

</html>