<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Data</title>
</head>
<body>
<div class="max-w-lg my-10 border border-slate-200 rounded-xl mx-auto p5 shadow-lg">    
    <h1 class="mt-5 text-2xl font-bold text-fuchsia-800 text-center">Update Data Kelas</h1>
    <form action="/kelas/{{ $kelas->id_kelas}}" method="post" enctype="multipart/form-data">
        @method("put")
        @csrf 
        <table class="table mx-auto">
            <tr>
                <td><label for="id_kelas"></label></td>
                <td><input type="text" name="id_kelas" class="mt-5 mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400 " style="background-color:pink;" value="{{$kelas->id_kelas}}" readonly></td>
            </tr>
            <tr>
                <td><label for="namakelas"></label></td>
                <td><input type="text" name="namakelas" class="mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400 " value="{{$kelas->namakelas}}"></td>
            </tr>
            <tr>
                <td><label for="walikelas"></label></td>
                <td><input type="text" name="walikelas" class="mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400 " value="{{$kelas->walikelas}}"></td>
            </tr>
            <tr>
                <td><label for="ketuakelas"></label></td>
                <td><input type="text" name="ketuakelas" class="mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400 " value="{{$kelas->ketuakelas}}"></td>
            </tr>
            <tr>
                <td><label for="kursi"></label></td>
                <td><input type="number" name="kursi" class="mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400 " value="{{$kelas->kursi}}"></td>
            </tr>
            <tr>
                <td><label for="meja"></label></td>
                <td><input type="number" name="meja" class="mb-1 px-3 py-2 border shadow rounded w-full block text-m focus:outline-none focus:ring-1 focus:ring-purple-400 " value="{{$kelas->meja}}"></td>
            </tr>
            <tr>
                <td><label for="gambar_kelas"></label></td>
                <td>   @if($kelas->gambar_kelas)
                       <img src="{{ asset('upload_gambar/' . $kelas->gambar_kelas) }}" alt="{{ $kelas->namakelas }}" width="100" heigt="100">
                    @else
                        <p>Tidak ada gambar saat ini.</p>
                    @endif        
                </td>
            </tr>
            <tr>
                <td><label for="gambar_kelas"></label></td>
                <td class="bg-purple-400 text-stone-50 px-4 py-2 rounded-md inline-block mb-4><input type="file" name="gambar_kelas" class="form-control" accept="image/*"></td>
            </tr>    
        </table>  
        <button type="submit" class="bg-purple-600 px-5 py-2 rounded-full text-zinc-300 font-semibold font-inter hover:bg-purple-900 active:bg-purple-950 focus:ring focus:ring-purple-600 ">Submit</button>  
    </form>   
    <form action="/kelas">
        @csrf
        <button type="submit" class="bg-purple-600 px-5 py-2 rounded-full text-zinc-300 font-semibold font-inter hover:bg-purple-900 active:bg-purple-950 focus:ring focus:ring-purple-600 ">Back</button>  
    </form>     
</div>
</body>
</html>