<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Elibyy\TCPDF\Facades\TCPDF;

class KelasController extends Controller
{ 
    protected $kelas;

    public function __construct(Kelas $kelas){
        $this->kelas = $kelas;
    }
    public function index()
    {
        $kelas = $this->kelas->all();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

public function store(Request $request) 
{
    $this->validate($request, [
        'namakelas' => 'required',
        'walikelas' => 'required',
        'ketuakelas' => 'required',
        'kursi' => 'required',
        'meja'=> 'required',
        'gambar_kelas' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $gambar_kelas = $request->file('gambar_kelas');
    $gambar_kelas_name = time() . '.' . $gambar_kelas->getClientOriginalExtension();
    $gambar_kelas->move(public_path('upload_gambar'), $gambar_kelas_name);
    
    Kelas::create([
        'namakelas' => $request->input('namakelas'),
        'walikelas' => $request->input('walikelas'),
        'ketuakelas' => $request->input('ketuakelas'),
        'kursi' => $request->input('kursi'),
        'meja'=> $request->input('meja'),
        'gambar_kelas' => $gambar_kelas_name,

    ]);

    return redirect('/kelas')->with('success', 'Data kelas berhasil disimpan');
}   

public function edit($id_kelas){
    $kelas = Kelas::find($id_kelas); //mengambil data kelas berdasarkan id_kelas

    if (!$kelas){
        return redirect ('/kelas')->with ('error','kelas tidak ditemukan');
    }
    return view ('kelas.edit', compact ('kelas'));
}

public function update (Request $request, $id_kelas){
    $kelas = Kelas::find($id_kelas);
   
    $this->validate($request, [
        'namakelas' => 'required',
        'walikelas' => 'required',
        'ketuakelas' => 'required',
        'kursi' => 'required',
        'meja'=> 'required',
        'gambar_kelas' => 'image|mimes:jpeg,png,jpg,gif',
    ]);

    if ($request->hasFile('gambar_kelas')){
        $gambar_kelas = $request->file('gambar_kelas');
        $gambar_kelas_name = time() . '.' . $gambar_kelas->getClientOriginalExtension();
        $gambar_kelas->move(public_path('upload_gambar'), $gambar_kelas_name);
        $kelas->gambar_kelas = $gambar_kelas_name;
    }

    $kelas->namakelas = $request->input('namakelas');
    $kelas->walikelas = $request->input('walikelas');
    $kelas->ketuakelas = $request->input('ketuakelas');
    $kelas->kursi = $request->input('kursi');
    $kelas->meja = $request->input('meja');


    $kelas->save();

    return redirect("/kelas");
}

    public function delete($id_kelas){
        $kelas = Kelas::find ($id_kelas);
        $kelas->delete();
        return redirect ("/kelas");
    }

    public function cari(Request $request){
    $searchQuery = $request->input('cari');
    $kelas = Kelas::where ('id_kelas', 'LIKE', "%$searchQuery%")
                    ->orWhere('namakelas', 'LIKE', "%$searchQuery%")
                    ->get();
    return view('kelas.index', compact('kelas'));    

    }

    public function pdf(Request $request){
        $filename ='KelasSiswa.pdf';
        //ambil data kelas dari satu tabel
        $kelas = kelas ::all();
        //buat HTML hanya untuk tabel kelas
        $html = '<table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                    </tr>';
        foreach ($kelas as $data){
            $html .= '<tr>
                        <td>' . $data->id_kelas . '</td>
                        <td>' . $data->namakelas . '</td>
                     </tr>';
        }    
        $html .= '</table>';
        $pdf = new TCPDF;
        $pdf::SetTitle ('KelasSiswa');
        $pdf::AddPage('L', 'A4');
        $pdf::writeHTML($html, true, false, true, false, '');
        // simpan pdf sementara d server (optional)
        $pdfPath = public_path($filename);
        $pdf::Output($pdfPath,'F');
        $pdf::Output($filename,'I'); //tidak new tab    

    }
}
