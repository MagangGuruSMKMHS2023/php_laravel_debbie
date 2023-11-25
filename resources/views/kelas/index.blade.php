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
    <label for="cari" class="p-1 ml-8"></label>
    <input type="text" placeholder="Cari Data" class="px-2 py-2 bg-violet-200 rounded-full focus:outline-none focus:ring-1 focus:ring-purple-300 placeholder:text-zinc-500 placeholder:font-normal" id="cari" name="cari">
    <button type="submit" class="bg-purple-600 p-1 text-zinc-300 px-3 font-semibold inline-block ml-6 rounded shadow hover:bg-purple-900 focus:ring-purple-300">Search</button>
</form>

<a href="kelas/create" class="bg-purple-600 p-1 text-zinc-300 font-semibold inline-block mt-3 ml-10 px-3 rounded shadow hover:bg-purple-900" >Tambah</a>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<table class="table-auto  w-full border mt-3 border-slate-400 m-10 ml-6">
<thead>    
 <tr>
        <th class="border p-4 border-slate-300 bg-slate-300 font-bold">Id Kelas</th>
        <th class="border p-4 border-slate-300 bg-slate-300 font-bold">Nama Kelas</th>
        <th class="border p-4 border-slate-300 bg-slate-300 font-bold">Wali Kelas</th>
        <th class="border p-4 border-slate-300 bg-slate-300 font-bold">Ketua Kelas</th>
        <th class="border p-4 border-slate-300 bg-slate-300 font-bold">Kursi</th>
        <th class="border p-4 border-slate-300 bg-slate-300 font-bold">Meja</th>
        <th class="border p-4 border-slate-300 bg-slate-300 font-bold ">Gambar</th>
        <th class="border p-7 border-slate-300 bg-slate-300 font-bold">Aksi</th>
</tr>
</thead>
    <?php foreach($kelas as $gr) : ?>
    <tr>
        <td class="border p-4 text-center"><?php echo $gr['id_kelas']; ?></td>
        <td class="border p-4 text-center"><?php echo $gr['namakelas']; ?></td>
        <td class="border p-4 text-center"><?php echo $gr['walikelas']; ?></td>
        <td class="border p-4 text-center"><?php echo $gr['ketuakelas']; ?></td>
        <td class="border p-4 text-center"><?php echo $gr['kursi']; ?></td>
        <td class="border p-4 text-center"><?php echo $gr['meja']; ?></td>
        <td class="border p-4">
            <a href="{{ asset('upload_gambar/' . $gr->gambar_kelas)}}" target="blank">
                <img src="{{ asset('upload_gambar/' . $gr->gambar_kelas) }}" alt="{{ $gr->namakelas }}" width="100" height="100">
        </a>    
        </td>    
        <td class="border p-4 text-center">
            <a href="/kelas/<?php echo $gr['id_kelas'];?>/edit" class= "text-cyan-500">Edit</a>
            <form action="/kelas/{{ $gr->id_kelas }}" method="post" class="inline">
                @csrf
                @method("delete")
                <input type="submit" value="Delete" class= "text-orange-600">
            </form>
        </td>
    </tr>    
    <?php endforeach; ?>
</table>
</body>
</html>