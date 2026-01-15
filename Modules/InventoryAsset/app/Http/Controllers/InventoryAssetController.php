<?php

namespace Modules\InventoryAsset\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\InventoryAsset\app\Models\Merk;

class MerkController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;

        $merks = Merk::when($cari, function ($q) use ($cari) {
                    $q->where('nama_merk', 'like', "%$cari%");
                })
                ->orderBy('id', 'desc')
                ->paginate(10);

        return view('inventoryasset::merk.index', compact('merks', 'cari'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_merk' => 'required|unique:merk_barang,kode_merk',
            'nama_merk' => 'required',
        ]);

        Merk::create($request->all());

        return redirect()
            ->route('merk.index')
            ->with('success', 'Data merk berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_merk' => 'required|unique:merk_barang,kode_merk,' . $id,
            'nama_merk' => 'required',
        ]);

        Merk::findOrFail($id)->update($request->all());

        return redirect()
            ->route('merk.index')
            ->with('success', 'Data merk berhasil diperbarui');
    }

    public function destroy($id)
    {
        Merk::findOrFail($id)->delete();

        return redirect()
            ->route('merk.index')
            ->with('success', 'Data merk berhasil dihapus');
    }
}
