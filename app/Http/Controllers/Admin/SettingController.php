<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Menampilkan form untuk mengedit semua setting Beranda
     */
    public function index()
    {
        // Ambil semua setting yang ada di database dan ubah ke format ['key' => 'value']
        $settings = Setting::pluck('value', 'key')->all();
        
        // Asumsi: View untuk admin berada di 'admin.settings.index'
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Menyimpan pembaruan setting Beranda
     */
    public function update(Request $request)
    {
        // Loop melalui setiap input form kecuali token dan method
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            
            // Simpan atau Perbarui data berdasarkan 'key'
            Setting::updateOrCreate(
                ['key' => $key], // Cari baris dengan key ini
                ['value' => $value] // Update nilainya
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan Beranda berhasil diperbarui.');
    }
}