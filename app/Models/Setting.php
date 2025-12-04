<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * Nama tabel yang terkait dengan Model. (Opsional, karena Laravel akan mencari 'settings' secara otomatis).
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'key', 
        'value', 
    ];

    /**
     * Menonaktifkan timestamps (kolom created_at dan updated_at)
     * jika Anda memilih untuk tidak memilikinya di tabel settings.
     * * @var bool
     */
    // public $timestamps = false; // Hapus tanda komentar jika Anda tidak menggunakan timestamps
}