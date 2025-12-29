<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'User';
        $users = User::orderBy('name', 'ASC')->where('role', '!=', 'admin')->paginate(5);

        $data = [
            'title' => $title,
            'users' => $users
        ];
        return view('admin.user.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        if (User::where('email', '=', $request->email)->count() > 0) {
            Alert::error('Error!', 'The email address you entered is already in use. Please use a different email.');
            return redirect()->route('userPage');
        }

        try {
            User::create([
                'name' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
            Alert::success('Success!', 'The user data has been saved successfully.');
            return redirect()->route('userPage');
        } catch (Exception $e) {
            Alert::error('Error!', 'Failed to save the data.');
            return redirect()->route('userPage');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function delete(string $id)
    {
        User::find($id)->delete();
        Alert::success('Success', 'Data dimasukan ke trash');
        return redirect()->route('userPage');
    }

    public function trash()
    {

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
