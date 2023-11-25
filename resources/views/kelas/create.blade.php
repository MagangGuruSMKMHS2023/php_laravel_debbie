<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Data Tambah Kelas</title>
</head>
<body> 
<div class="max-w-lg my-10 border border-slate-200 rounded-xl mx-auto p5 shadow-lg">
    <h1 class="mt-5 text-2xl font-bold text-fuchsia-800 text-center">Create Kelas</h1>
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form action="/kelas/store" method="post" enctype="multipart/form-data">
        @csrf 
        <table class="table mx-auto">
            <tr>
             <td><label for="namakelas"></td></label>
                <td><input type="text" placeholder="Nama Kelas" name="namakelas" class="mt-7 mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400 " required></td>
            </tr>
            <tr>
                <td><label for="walikelas"></label></td>
                <td><input type="text" placeholder="Wali Kelas" name="walikelas" class="mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400" required></td>
            </tr>
            <tr>
                <td><label for="ketuakelas"></label></td>
                <td><input type="text" placeholder="Ketua Kelas" name="ketuakelas" class="mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400" required></td>
            </tr>
            <tr>
                <td><label for="kursi"></label></td>
                <td><input type="number" placeholder="Jumlah Kursi" name="kursi" class="mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400" required></td>
            </tr>
            <tr>
                <td><label for="meja"></label></td>
                <td><input type="number" placeholder="Jumlah Meja" name="meja" class="mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400" required></td>
            </tr>
            <tr>
                <td><label for="gambar_kelas"></label></td>
                <td class="bg-purple-400 text-stone-50 px-4 py-2 rounded-md inline-block mb-4"><input type="file" name="gambar_kelas" class=" hover:bg-purple-900 active:bg-purple-950 focus:ring focus:ring-purple-600" accept="image/*"required></td>
            </tr>
        </table>  
        <a href="/kelas" class="bg-purple-600 w-40 ml-24 mt-3 px-5 py-2 text-center rounded-md text-zinc-300 font-semibold font-inter hover:bg-purple-900 active:bg-purple-950 focus:ring focus:ring-purple-600 inline-block">Back</a>
        <button type="submit" class="w-40 bg-purple-600 px-5  py-2 mb-5 text-center rounded-md text-zinc-300 font-semibold font-inter hover:bg-purple-900 active:bg-purple-950 focus:ring focus:ring-purple-600 ">Submit</button>  
    </form>   
    </div>    
</body>
</html>