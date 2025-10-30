<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Console;
use App\Models\Rental;
use App\Models\Payment;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'games' => Game::count(),
            'consoles' => Console::count(),
            'rentals' => Rental::count(),
            'payments' => Payment::count(),
            'users' => User::where('role', '!=', 'admin')->count(),
            'active_rentals' => Rental::where('status', 'paid')->where('end_at', '>', now())->count(),
            'total_revenue' => Rental::where('status', 'paid')->sum('total_price') ?? 0,
        ];

        $latestRentals = Rental::with('console', 'user')
            ->orderByDesc('id')
            ->limit(10)
            ->get();

        $latestPayments = Payment::with('rental')
            ->orderByDesc('id')
            ->limit(8)
            ->get();

        return view('admin.dashboard', compact('stats', 'latestRentals', 'latestPayments'));
    }
}
