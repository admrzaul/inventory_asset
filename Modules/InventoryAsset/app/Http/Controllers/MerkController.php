<?php

namespace Modules\InventoryAsset\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index(Request $request)
    {
        return view('inventoryasset::index');
    
        $filter = $request->input('cari');

        $model = merk::query();

        if ($filter) {
            $merk->where(function ($query) use ($merk) {
                $query->where('nama','like','%'.$merk. '%')
                ->orWhere('deskripsi','like','%'.$merk. '%');
            });

        }
        $filter = $filter->latest()->paginate(10);

        return view('inventoryasset::lokasi.index', compact('filter','merk'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventoryasset::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('inventoryasset::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('inventoryasset::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
