<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-2xl font-bold underline text-purple-700 text-center"> Halaman Menggunakan Tailwindcss</h1>   
 
@include('includes._header')
<form action="/cari" method="get">
    <label for="cari" >Cari Data</label>
    <input type="text" id="cari" name="cari">
    <button type="submit">Search</button>
</form>

<a href="kelas/create" class="bg-purple-600 p-1 text-zinc-300 text-bold inline-block m-3 rounded shadow hover:bg-purple-900" >Tambah</a>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<table class="border-separate border border-slate-400">
    <tr>
        <td class="border p-4 border-slate-300 bg-slate-300 font-semibold">Id Kelas</td>
        <td class="border p-4 border-slate-300 bg-slate-300 font-semibold">Nama Kelas</td>
        <td class="border p-4 border-slate-300 bg-slate-300 font-semibold">Wali Kelas</td>
        <td class="border p-4 border-slate-300 bg-slate-300 font-semibold">Ketua Kelas</td>
        <td class="border p-4 border-slate-300 bg-slate-300 font-semibold">Kursi</td>
        <td class="border p-4 border-slate-300 bg-slate-300 font-semibold">Meja</td>
        <td class="border p-4 border-slate-300 bg-slate-300 font-semibold ">Gambar</td>
        <td class="border p-7 border-slate-300 bg-slate-300 font-semibold">Aksi</td>
    </tr>
    <?php foreach($kelas as $gr) : ?>
    <tr>
        <td><?php echo $gr['id_kelas']; ?></td>
        <td><?php echo $gr['namakelas']; ?></td>
        <td><?php echo $gr['walikelas']; ?></td>
        <td><?php echo $gr['ketuakelas']; ?></td>
        <td><?php echo $gr['kursi']; ?></td>
        <td><?php echo $gr['meja']; ?></td>
        <td>
            <a href="{{ asset('upload_gambar/' . $gr->gambar_kelas)}}" target="blank">
                <img src="{{ asset('upload_gambar/' . $gr->gambar_kelas) }}" alt="{{ $gr->namakelas }}" width="100" height="100">
        </a>    
        </td>    
        <td>
            <a href="/kelas/<?php echo $gr['id_kelas'];?>/edit">Edit</a>
            <form action="/kelas/{{ $gr->id_kelas }}" method="post">
                @csrf
                @method("delete")
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>    
    <?php endforeach; ?>
</table>
</body>
</html>