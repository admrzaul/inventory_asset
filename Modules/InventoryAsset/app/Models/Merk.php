<?php

namespace Modules\InventoryAsset\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\InventoryAsset\Database\Factories\MerkFactory;

class merk extends Model
{
    use HasFactory;
    protected $table = 'merk';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
    'kode_merk',
    'nama_merk',
    'keterangan',
    ];
    // protected static function newFactory(): MerkFactory
    // {
    //     // return MerkFactory::new();
    // }
}
