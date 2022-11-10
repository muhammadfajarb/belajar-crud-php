<?php
include('config.php');
$result = mysqli_query($conn, "SELECT * FROM tugas ORDER BY deadline DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>

<body>
    <h1>Belajar CRUD PHP</h1>

    <div>Berikut adalah data Tugas Mahasiswa:</div>

    <a href="add.php">Tambah Data</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($result)) {
            if ($row['status'] == 0) {
                $status = 'Belum dikerjakan';
            } elseif ($row['status'] == 1) {
                $status = 'Sedang dikerjakan';
            } else {
                $status = 'Selesai';
            }

            echo '
                <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['judul'] . '</td>
                    <td>' . $row['deadline'] . '</td>
                    <td>' . $status . '</td>
                    <td>
                        <a href="edit.php?id=' . $row['id'] . '">Edit</a>
                        <a href="delete.php?id=' . $row['id'] . '">Hapus</a>
                    </td>
                </tr>
            ';
        }
        ?>
        
    </table>


</body>

</html>