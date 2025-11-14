<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Console;

class ConsoleController extends Controller
{
    public function adminIndex()
    {
        $consoles = Console::orderBy('type')->orderBy('name')->paginate(16);
        return view('admin.consoles.index', compact('consoles'));
    }

    public function create()
    {
        $console = new Console();
        return view('admin.consoles.form', compact('console'));
    }

    public function store(Request $request)
    {
        $data = $this->validateConsole($request);
        Console::create($data);
        return redirect()->route('admin.consoles.index')->with('status', 'Konsol ditambahkan.');
    }

    public function edit(Console $console)
    {
        return view('admin.consoles.form', compact('console'));
    }

    public function update(Request $request, Console $console)
    {
        $data = $this->validateConsole($request);
        $console->update($data);
        return redirect()->route('admin.consoles.index')->with('status', 'Konsol diperbarui.');
    }

    public function destroy(Console $console)
    {
        $console->delete();
        return redirect()->route('admin.consoles.index')->with('status', 'Konsol dihapus.');
    }

    private function validateConsole(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:PS4,PS5',
            'status' => 'required|in:available,rented',
            'hourly_rate' => 'required|integer|min:0',
            'rented_until' => 'nullable|date',
        ]);
    }
}
