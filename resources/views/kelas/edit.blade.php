<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h1>Update Data Kelas</h1>
    <form action="/kelas/{{ $kelas->id_kelas}}" method="post" enctype="multipart/form-data">
        @method("put")
        @csrf 
        <table class="table">
            <tr>
                <td><label for="id_kelas">Id Kelas </label></td>
                <td><input type="text" name="id_kelas" class="form-control" style="background-color:Tomato;" value="{{$kelas->id_kelas}}" readonly></td>
            </tr>
            <tr>
                <td><label for="namakelas">Nama Kelas </label></td>
                <td><input type="text" name="namakelas" class="form-control" value="{{$kelas->namakelas}}"></td>
            </tr>
            <tr>
                <td><label for="walikelas">Nama Wali Kelas </label></td>
                <td><input type="text" name="walikelas" class="form-control" value="{{$kelas->walikelas}}"></td>
            </tr>
            <tr>
                <td><label for="ketuakelas">Ketua Kelas </label></td>
                <td><input type="text" name="ketuakelas" class="form-control" value="{{$kelas->ketuakelas}}"></td>
            </tr>
            <tr>
                <td><label for="kursi">Jumlah Kursi </label></td>
                <td><input type="number" name="kursi" class="form-control" value="{{$kelas->kursi}}"></td>
            </tr>
            <tr>
                <td><label for="meja">Jumlah Meja </label></td>
                <td><input type="number" name="meja" class="form-control" value="{{$kelas->meja}}"></td>
            </tr>
            <tr>
                <td><label for="gambar_kelas">Gambar Kelas </label></td>
                <td>   @if($kelas->gambar_kelas)
                       <img src="{{ asset('upload_gambar/' . $kelas->gambar_kelas) }}" alt="{{ $kelas->namakelas }}" width="100" heigt="100">
                    @else
                        <p>Tidak ada gambar saat ini.</p>
                    @endif        
                </td>
            </tr>
            <tr>
                <td><label for="gambar_kelas">Ganti Gambar </label></td>
                <td><input type="file" name="gambar_kelas" class="form-control" accept="image/*"></td>
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