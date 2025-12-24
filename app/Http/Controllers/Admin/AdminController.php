<?php

namespace App\Http\Controllers\admin;

use App\Models\item;
use App\Models\loan;
use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $user = User::count();
        $item = Item::count();
        $category = Category::count();
        $borrow = Loan::Where('status', '=', 'borrowed')->count();
        $return = Loan::Where('status', '=', 'returned')->count();

        $history = Loan::where('status', '=', 'borrowed')->with('user', 'item_loan')->orderBy('id', 'DESC')->limit(5)->get();

        $data = [
            'title' => $title,
            'user' => $user,
            'item' => $item,
            'category' => $category,
            'borrow' => $borrow,
            'return' => $return,
            'last' => $history
        ];

        return view('admin.dashboard', $data);
    }
}
