<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller 
{

   public function index()
{
    $about = AboutPage::first();
    return view('about', compact('about'));
}

public function edit()
{
    
    $about = AboutPage::firstOrCreate(
        ['id' => 1], 
        [            
            'title' => 'Judul Halaman About Default',
            'subtitle' => 'Sub Judul Halaman About Default',
           
        ]
    );

    return view('admin.about.edit', compact('about'));
}
public function update(Request $request)
{
    $about = AboutPage::first();

    $data = $request->all();

    // upload gambar hero
    if ($request->hasFile('hero_image')) {
        $data['hero_image'] = $request->file('hero_image')->store('about', 'public');
    }

    // upload foto tim
    foreach ([1,2,3] as $i) {
        if ($request->hasFile("team_{$i}_image")) {
            $data["team_{$i}_image"] = $request->file("team_{$i}_image")->store('about/team', 'public');
        }
    }

    $about->update($data);

    return back()->with('success', 'Halaman About berhasil diperbarui!');
}
}