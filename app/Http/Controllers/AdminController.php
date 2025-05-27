<?php

namespace App\Http\Controllers;

use App\Models\Narudzbina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user || !$user->role || !in_array(strtolower($user->role->name), ['admin', 'editor'])) {
            abort(403, 'Nemaš pristup ovoj stranici.');
        }

        $narudzbine = Narudzbina::selectRaw('DATE(created_at) as datum, COUNT(*) as broj')
            ->groupBy('datum')
            ->orderBy('datum', 'asc')
            ->get();

        $chartData = $narudzbine->map(function ($n) {
            return [$n->datum, $n->broj];
        });

        return view('admin.dashboard', [
            'chartData' => $chartData
        ]);
    }
}
