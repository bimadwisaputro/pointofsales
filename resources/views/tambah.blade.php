<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Laravel</title>
</head>

<body>
    <h1>Operasi Aritmatika</h1>
    <a href="tambah">Tambah</a>
    <a href="kurang">Kurang</a>
    <a href="bagi">Bagi</a>
    <a href="kali">Kali</a>
    <form action="action-operator" method="post">
        <input type="radio" name="tipe" id="tipe" value="tambah">
        <input type="radio" name="tipe" id="tipe" value="kurang">
        <input type="radio" name="tipe" id="tipe" value="kali">
        <input type="radio" name="tipe" id="tipe" value="bagi">
        <label for="">Angka 1</label>
        <input type="number" name="angka1">
        <br>
        <label for="">Angka 2</label>
        <input type="number" name="angka2">
        <br>
        <button type="submit">Proses</button>
    </form>
</body>

</html>
