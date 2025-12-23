<?php

namespace App\Http\Controllers\admin;

use App\Models\loan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $history = Loan::with('user', 'item_loan.item')->get();
        $user = User::all();

        $data = [
            'title' => $title,
            'history' => $history,
            'user' => $user
        ];
        return view('admin.dashboard', $data);
    }
}
