<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Data Tambah Kelas</title>
</head>
<body>
    <h1 class="text-2xl font-bold text-fuchsia-800 text-center">Create Kelas</h1>
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form action="/kelas/store" method="post" enctype="multipart/form-data">
        @csrf 
        <table class="table">
            <tr>
                <td><label for="namakelas">Nama Kelas </label></td>
                <td><input type="text" name="namakelas" class="form-control" required></td>
            </tr>
            <tr>
                <td><label for="walikelas">Nama Wali Kelas </label></td>
                <td><input type="text" name="walikelas" class="form-control" required></td>
            </tr>
            <tr>
                <td><label for="ketuakelas">Ketua Kelas </label></td>
                <td><input type="text" name="ketuakelas" class="form-control" required></td>
            </tr>
            <tr>
                <td><label for="kursi">Jumlah Kursi </label></td>
                <td><input type="number" name="kursi" class="form-control" required></td>
            </tr>
            <tr>
                <td><label for="meja">Jumlah Meja </label></td>
                <td><input type="number" name="meja" class="form-control" required></td>
            </tr>
            <tr>
                <td><label for="gambar_kelas">Gambar Kelas </label></td>
                <td><input type="file" name="gambar_kelas" class="form-control" accept="image/*"required></td>
            </tr>
        </table>  
        <button type="submit" class="btn btn-primary">Submit</button>  
    </form>   
    <form action="/kelas">
        @csrf
        <button type="submit" class="btn btn-primary">Back</button>  
    </form> 
</body>
</html>