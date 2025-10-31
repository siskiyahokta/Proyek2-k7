<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Console;
use App\Models\Rental;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Gunakan DB::raw untuk efisiensi query
        $stats = [
            'games'           => Game::count(),
            'consoles'        => Console::count(),
            'total_rentals'   => Rental::count(),
            'pending_rentals' => Rental::where('status', 'pending')->count(),
            'active_rentals'  => Rental::where('status', 'paid')
                                        ->where('end_at', '>', now())
                                        ->count(),
            'total_users'     => User::where('role', '!=', 'admin')->count(),
            'total_revenue'   => Rental::where('status', 'paid')->sum('total_price'),
        ];

        // Latest rentals with console & user
        $latestRentals = Rental::with(['console', 'user'])
            ->select('rentals.*')
            ->latest()
            ->limit(10)
            ->get();

        // Latest payments with rental & console
        $latestPayments = Payment::with([
                'rental' => fn($q) => $q->withTrashed(),
                'rental.console',
                'rental.user'
            ])
            ->latest()
            ->limit(8)
            ->get();

        // Chart data: Pendapatan per hari (7 hari terakhir)
        $revenueChart = Rental::where('status', 'paid')
            ->where('updated_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(updated_at) as date, SUM(total_price) as revenue')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('revenue', 'date')
            ->toArray();

        // Isi hari yang kosong dengan 0
        $dates = [];
        $revenues = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dates[] = $date;
            $revenues[] = $revenueChart[$date] ?? 0;
        }

        return view('admin.dashboard', compact(
            'stats',
            'latestRentals',
            'latestPayments',
            'dates',
            'revenues'
        ));
    }
}