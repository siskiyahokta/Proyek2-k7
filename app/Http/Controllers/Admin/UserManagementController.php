<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(): View
    {
        $users = User::where('role', '!=', 'admin')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function toggleBlock(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'blocked' => ['required', 'boolean'],
        ]);

        $user->blocked = $validated['blocked'];
        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('status', 'User ' . $user->name . ' ' . ($validated['blocked'] ? 'diblokir' : 'diaktifkan kembali') . '.');
    }
}
