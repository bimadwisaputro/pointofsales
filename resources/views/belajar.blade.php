<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
</head>

<body>
    <h1>Operasi Aritmatika</h1>
    {{-- <a href="tambah">Tambah</a>
    <a href="kurang">Kurang</a>
    <a href="bagi">Bagi</a>
    <a href="kali">Kali</a> --}}
    <form action="action-operator" method="post">
        @csrf
        <input type="radio" name="tipe" id="tipe" value="tambah" {{ $tambah }}> +
        <input type="radio" name="tipe" id="tipe" value="kurang" {{ $kurang }}> -
        <input type="radio" name="tipe" id="tipe" value="kali" {{ $kali }}> x
        <input type="radio" name="tipe" id="tipe" value="bagi" {{ $bagi }}> /
        <br>
        <label for="">Angka 1</label>
        <input type="number" name="angka1" value="{{ $angka1 }}">
        <br>
        <label for="">Angka 2</label>
        <input type="number" name="angka2" value="{{ $angka2 }}">
        <br>
        <button type="submit">Proses</button>
    </form>
    <br>
    <h3> Total nya adalah : {{ $jumlah }}</h3>
</body>

</html>
