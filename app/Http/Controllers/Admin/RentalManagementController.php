<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RentalManagementController extends Controller
{
    public function index(): View
    {
        $rentals = Rental::with(['console', 'user'])->latest()->paginate(20);

        return view('admin.rentals.index', compact('rentals'));
    }

    public function updateStatus(Request $request, Rental $rental): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,paid,cancelled'],
        ]);

        $rental->update(['status' => $validated['status']]);

        return redirect()
            ->route('admin.rentals.index')
            ->with('status', 'Status rental #' . $rental->id . ' diperbarui menjadi ' . $validated['status'] . '.');
    }
}
