<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Tambah Data</h1>
        <form action="proses.php" method="post" enctype="multipart/form-data">
            <table>
            <tr>
                <td>ID Buku</td>
                <td>:</td>
                <td><input type="text" name="id" id=""></td>
            </tr>
            <tr>
                <td>Nama Buku</td>
                <td>:</td>
                <td><input type="text" name="nama" id=""></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input type="text" name="penerbit" id=""></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td>:</td>
                <td><input type="text" name="genre" id=""></td>
            </tr>
            <tr>
                <td>Seen</td>
                <td>:</td>
                <td><input type="text" name="seen" id=""></td>
            </tr>
            <tr>
                <td>Rate</td>
                <td>:</td>
                <td><input type="text" name="rate" id=""></td>
            </tr>
            </table>
            <label for="">Gambar</label>
            <input type="file" name="cover" id="cover">
            <br>
            <input type="submit" id="simpan">
        </form>

    
</body>
</html>