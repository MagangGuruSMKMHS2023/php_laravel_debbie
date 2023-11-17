@include('includes._header')
<form action="/cari" method="get">
    <label for="cari">Cari Data</label>
    <input type="text" id="cari" name="cari">
    <button type="submit">Search</button>
</form>

<a href="kelas/create">Tambah</a>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<table border="1">
    <tr>
        <td>Id Kelas</td>
        <td>Nama Kelas</td>
        <td>Wali Kelas</td>
        <td>Ketua Kelas</td>
        <td>Kursi</td>
        <td>Meja</td>
        <td>Gambar</td>
        <td>Aksi</td>
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