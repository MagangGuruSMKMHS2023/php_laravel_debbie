<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
   
@include('includes._header')
<form action="/cari" method="get">
    <label for="cari" class="text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative ">
        <div class="absolute inset-y-0 ml-10 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" id="cari" name="cari" class="block w-64 p-4 ps-14 text-m ml-6 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none focus:ring-1 focus:ring-violet-800" placeholder="Cari Data Kelas...." required>
        <button type="submit" class="text-white absolute ml-72 bottom-2.5 bg-purple-500  hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-4 py-2 dark:bg-purple-400 dark:hover:bg-purple-600 dark:focus:ring-purple-900">Search</button>
    </div>
</form>

<a href="kelas/create" class="bg-purple-400 hover:bg-purple-900 text-white  font-semibold hover:text-white py-2 px-4 border
border-purple-300 hover:border-transparent rounded inline-block mt-3 ml-6  shadow" >Tambah</a>
<a href="/nilai/pdf" onclick="exportPdf()" target="_blank" class="bg-slate-400 hover:bg-purple-900 text-white  font-semibold hover:text-white py-2 px-4 border
border-purple-300 hover:border-transparent rounded mt-8 ml-10" id="openPdfInNewTab">Export PDF</a>
 
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

<table class="table-auto w-full border mt-3 border-slate-400 m-10 ml-6">
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