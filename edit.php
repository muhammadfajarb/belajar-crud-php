<?php
include('config.php');
$result = mysqli_query($conn, "SELECT * FROM tugas WHERE id='" . $_GET['id'] . "'");

while ($row = mysqli_fetch_array($result)) {
    $judul = $row['judul'];
    $deadline = $row['deadline'];
    $status = $row['status'];
}


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

    <form method="POST" action="edit.php?id=<?php echo $_GET['id']; ?>">
        <div class="input-form">
            <label>Judul</label><br>
            <input type="text" name="judul" value="<?php echo $judul; ?>">
        </div>
        <div class="input-form">
            <label>Deadline</label><br>
            <input type="date" name="deadline" value="<?php echo $deadline; ?>">
        </div>
        <div class="input-form">
            <label>Status</label><br>
            <select name="status">
                <option value="0" <?php if($status == 0) { echo 'selected'; } ?>>Belum dikerjakan</option>
                <option value="1" <?php if($status == 1) { echo 'selected'; } ?>>Sedang dikerjakan</option>
                <option value="2" <?php if($status == 2) { echo 'selected'; } ?>>Selesai</option>
            </select>
        </div>
        <div>
            <input type="submit" name="update" value="UPDATE">
        </div>
    </form>

    <?php
    if (isset($_POST['update'])) {

        $result = mysqli_query($conn, 'UPDATE tugas SET judul="'.$_POST['judul'].'", deadline="'.$_POST['deadline'].'", status="'.$_POST['status'].'" WHERE id="'.$_GET['id'].'";');

        header('Location: index.php');
    }
    ?>
</body>

</html>