<?php

namespace App\Http\Controllers;

use App\Models\DashboardModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        //medapatkan semua data pesanan
        $pesanan = DashboardModel::all();
        //jika ada request ajax maka yang direturn adalah datatables
        
        return view('dashboard', compact('pesanan'));
    }


    public function store(Request $request)
    {
        // DashboardModel::updateOrCreate(
        //     ['id' => $request->id],
        //     [
        //         'kode_pesanan' => $request->kode_pesanan,
        //         'tanggal_pesanan' => $request->tanggal_pesanan,
        //         'pelanggan' => $request->pelanggan,
        //         'total_harga' => $request->total_harga,
        //     ]
        // );

        
        // $pelanggan = $request->input('pelanggan');
        // $tanggal_pesanan = $request->input('tanggal_pesanan');
        $kode_pesanan = $request->input('kode_pesanan');
        $harga = $request->input('harga');
        $pelanggan = $request->input('pelanggan');
        $tanggal_pesanan = $request->input('tanggal_pesanan');
        
        DashboardModel::create([
            'kode_pesanan' => $kode_pesanan,
            'harga' => $harga,
            'pelanggan' => $pelanggan,
            'tanggal_pesanan' => $tanggal_pesanan
            ]);
        // $data = new DashboardModel;
        // $data->kode_pesanan=$kode_pesanan;
        // $data->harga=$harga;
        // $data->pelanggan=$pelanggan;
        // $data->tanggal_pesanan= $tanggal_pesanan;
        
        // $data->save();
        // Session::flash('berhasil_tambah', 'Data berhasil di tambah');
        
        // return redirect('/dashboard');
       
        // $data = new DashboardModel;
        
        // $data->kode_pesanan = $kode_pesanan;
        // $data->harga = $harga;
        // $data->pelanggan = $pelanggan;
        // $data->tanggal_pesanan = $tanggal_pesanan;
        
        // $data->save();
        
        Session::flash('berhasil_tambah', 'Data berhasil ditambah');
        
        return redirect('/dashboard');

    }
    
    public function update(Request $request, string $id){
        
        $dataUpdate = DashboardModel::find($id);
        $dataUpdate->kode_pesanan = $request->input('kode_pesanan');
        $dataUpdate->harga = $request->input('harga');
        $dataUpdate->pelanggan = $request->input('pelanggan');
        $dataUpdate->tanggal_pesanan = $request->input('tanggal_pesanan');

        $dataUpdate->save();
        Session::flash('success', 'Proses update data tugas telah berhasil.');
        return redirect('/dashboard');
    }

    public function edit($id)
    {
        //mengambil data sesuai id
        $pesanan = DashboardModel::find($id);
        return view('edit', compact('pesanan'));
    }


    public function destroy($id)
    {
        //delete sow
        $data = DashboardModel::find($id);
        $data->delete();
        Session::flash('berhasil_hapus', 'Berhasil di hapus');
        return redirect('/dashboard');
    }
}
