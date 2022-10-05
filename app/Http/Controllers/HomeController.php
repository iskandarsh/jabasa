<?php
  
namespace App\Http\Controllers;
 

use Illuminate\Http\Request;
  
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $jamus = \App\Models\Jamu::all();
        return view('admin.halamanadmin', compact('jamus'));
    }
     public function adminformkota()
    {
        return view('admin.forminputkota');
    }

    public function store(Request $request)
    {
        \App\Models\Kota::create([
            'nama_kota'     => $request->namakota
         ]);
        return redirect()->route('admin.forminputkota')
        ->with('sukses','Company has been created successfully.');
    }
    
    public function kec()
    {
        $kotas = \App\Models\Kota::all();
        return view('admin.forminputkec', compact('kotas'));
    }

    public function kecstore(Request $request)
    {
        \App\Models\Kecamatan::create([
            'nama_kecamatan'     => $request->namakec,
            'kota_id'     => $request->kota_id
         ]);
        return redirect()->route('k.kec')
        ->with('sukses','Company has been created successfully.');
    }
    public function produsen()
    {
        $kecamatans = \App\Models\Kecamatan::all();
        $levels     = \App\Models\Level::all();
        return view('admin.forminputprodusen', compact('kecamatans','levels'));
    }
    public function produsenstore(Request $request)
    {
        \App\Models\Produsen::create([
            'nama'     => $request->namaprodusen,
            'alamat'     => $request->alamat,
            'ket_bahan'     => $request->ket,
            'kec_id'     => $request->kec_id,
            'level_id'  => $request->level_id,
            'lokasi_pemasaran' => $request->lokasi
         ]);
        return redirect()->route('kec.produsen')
        ->with('sukses','Company has been created successfully.');
    }
    public function agen()
    {
        
        $kecamatans = \App\Models\Kecamatan::all();
        return view('admin.forminputagen', compact('kecamatans'));
    }
    public function agenstore(Request $request)
    {
        \App\Models\Produsen::create([
            'nama'     => $request->namaprodusen,
            'kec_id'     => $request->kec_id,
            'lokasi_pemasaran' => $request->lokasi
         ]);
        return redirect()->route('kec.agen')
        ->with('sukses','Company has been created successfully.');
    }
    public function detailjamu()
    {
        return view('admin.forminputdetailjamu');
    }
    public function detailstore(Request $request)
    {
        \App\Models\Detailjamu::create([
            'nama_jamu'     => $request->nama_jamu,
            'manfaat'     => $request->manfaat,
            'formula'     => $request->formula,
            'efeksamping'     => $request->efeksamping,
            'jenis'     => $request->jenis
         ]);
        return redirect()->route('jamu.detailjamu')
        ->with('sukses','Company has been created successfully.');
    }
    public function jamu()
    {
        $detailjamus = \App\Models\Detailjamu::all();
        $produsens = \App\Models\Produsen::all();
        return view('admin.forminputjamu', compact('detailjamus','produsens'));
    }
    public function jamustore(Request $request)
    {
        \App\Models\Jamu::create([
            'detail_id'     => $request->detail_id,
            'persediaan'     => $request->persediaan,
            'kemasan'     => $request->kemasan,
            'produsen_id'     => $request->produsen_id
         ]);
        return redirect()->route('j.jamu')
        ->with('sukses','Company has been created successfully.');
    }
    public function datakota(\App\Models\Kota $kota)
    {
        $kotas = \App\Models\Kota::all();
        return view('admin.datakota', compact('kotas'));
    }
    public function datakec()
    {
        $kecamatans = \App\Models\Kecamatan::all();
        $kotas = \App\Models\Kota::all();
        return view('admin.datakec', compact('kecamatans','kotas'));
    }
    public function dataprodusen()
    {
        $produsens = \App\Models\Produsen::all();
        return view('admin.dataprodusen', compact('produsens'));
    }
    public function dataagen()
    {
        $produsens = \App\Models\Produsen::all();
        return view('admin.dataagen', compact('produsens'));
    }
    public function datadetail()
    {
        $detailjamus = \App\Models\Detailjamu::all();
        return view('admin.datadetailjamu', compact('detailjamus'));
    }
    public function datajamu()
    {
        $jamus = \App\Models\Jamu::all();
        return view('admin.datajamu', compact('jamus'));
    }
    public function editkota($kota_id)
    {    
        // $kotas   = \App\Models\Kota::all();
        // $kotas= \App\Models\Kota::where('id',$kotas);
        $kota= \App\Models\Kota::find($kota_id);
        return view('admin.editdatakota', compact('kota'));
    }
    public function editkec($kecamatan_id)
    {
        $kecamatans= \App\Models\Kecamatan::find($kecamatan_id);
        $kotas= \App\Models\Kota::all();
        return view('admin.editdatakec', compact('kecamatans','kotas'));
    }
    public function editprodusen($produsen_id)
    {
        $produsen= \App\Models\Produsen::find($produsen_id);
        $kecamatans= \App\Models\Kecamatan::all();
        $levels= \App\Models\Level::all();
        return view('admin.editdataprodusen', compact('produsen','kecamatans','levels'));
    }
    public function editdetailjamu($detailjamu_id)
    {
        $detailjamu= \App\Models\Detailjamu::find($detailjamu_id);
        return view('admin.editdetailjamu', compact('detailjamu'));
    }
    public function editjamu($jamu_id)
    {
        $jamu= \App\Models\Jamu::find($jamu_id);
        $produsens= \App\Models\Produsen::all();
        $detailjamus= \App\Models\Detailjamu::all();
        return view('admin.editjamu', compact('produsens','jamu','detailjamus'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }

    public function kotadestroy($kota_id)
    {
        $kota= \App\Models\Kota::find($kota_id)->delete();

        return redirect()->route('kota.datakota')
             ->withSuccess(__('Post delete successfully.'));
    }
    public function updatekota(Request $request  ,\App\Models\Kota $kota )
    {
        \App\Models\Kota::where('id', $request->id)->update(['nama_kota' => $request->name]);
        $kota->update();
        return redirect()->route('kota.datakota')
             ->withSuccess(__('Post delete successfully.'));
    }

    public function kecdestroy($kecamatan_id)
    {
        $kecamatan= \App\Models\Kecamatan::find($kecamatan_id)->delete();

        return redirect()->route('kec.datakec')
             ->withSuccess(__('Post delete successfully.'));
    }
    public function updatekec(Request $request  ,\App\Models\Kecamatan $kecamatan )
    {
        
        \App\Models\Kecamatan::where('id', $request->id)->update(['nama_kecamatan' => $request->name,
        'kota_id'=> $request->kota_id]);
        $kecamatan->update();
        return redirect()->route('kec.datakec')
             ->withSuccess(__('Post delete successfully.'));
    }
    public function produsendestroy($produsen_id)
    {
        $produsen= \App\Models\Produsen::find($produsen_id)->delete();

        return redirect()->route('p.dataprodusen')
             ->withSuccess(__('Post delete successfully.'));
    }
    public function updateprodusen(Request $request  ,\App\Models\Produsen $produsen )
    {
        \App\Models\Produsen::where('id', $request->id)->update(['nama' => $request->name,
        'kec_id'=> $request->kec_id,
        'alamat'=> $request->alamat,
        'ket_bahan'=> $request->ket,
        'level_id'=> $request->level_id,
        'lokasi_pemasaran' => $request->lokasi]);
        $produsen->update();
        return redirect()->route('p.dataprodusen')
             ->withSuccess(__('Post delete successfully.'));
    }
    
    public function detailjamudestroy($detailjamu_id)
    {
        \App\Models\Detailjamu::find($detailjamu_id)->delete();

        return redirect()->route('d.datadetail')
             ->withSuccess(__('Post delete successfully.'));
    }
    public function updatedetailjamu(Request $request  ,\App\Models\Detailjamu $detailjamu )
    {
        \App\Models\Detailjamu::where('id', $request->id)->update(['nama_jamu' => $request->name,
        'manfaat'=> $request->manfaat,
        'formula'=> $request->formula,
        'efeksamping'=> $request->efek,
        'jenis'=> $request->jenis]);
        $detailjamu->update();
        return redirect()->route('d.datadetail')
             ->withSuccess(__('Post delete successfully.'));
    }
    public function jamudestroy($jamu_id)
    {
        $jamu= \App\Models\Jamu::find($jamu_id)->delete();

        return redirect()->route('j.datajamu')
             ->withSuccess(__('Post delete successfully.'));
    }
    public function updatejamu(Request $request  ,\App\Models\Jamu $jamu )
    {
        \App\Models\Jamu::where('id', $request->id)->update(['persediaan' => $request->persediaan,
        'detail_id'=> $request->detailjamu_id,
        'kemasan'=> $request->kemasan,
        'produsen_id'=> $request->produsen_id]);
        $jamu->update();
        return redirect()->route('j.datajamu')
             ->withSuccess(__('Post delete successfully.'));
    }
}