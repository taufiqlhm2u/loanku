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
        $title = 'Users';
        $users = User::orderBy('name', 'ASC')->where('role', '!=', 'admin')->paginate(5);

        $data = [
            'title' => $title,
            'users' => $users
        ];
        return view('admin.user.user', $data);
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
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        try {
            if ($request->password == '') {
                User::where('id', '=', $request->idUser)->update([
                    'name' => $request->fullname,
                    'email' => $request->email,
                    'role' => $request->role
                ]);
            } else {
                User::where('id', '=', $request->idUser)->update([
                    'name' => $request->fullname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role
                ]);
            }
            Alert::success('Success!', 'The user data has been update successfully.');
            return redirect()->route('userPage');
        } catch (Exception $e) {
             Alert::error('Error!', 'Failed to update the data.');
            return redirect()->route('userPage');
        }
    }

    public function delete(string $id)
    {
        User::find($id)->delete();
        Alert::success('Success!', 'The user data has been trashed.');
        return redirect()->route('userPage');
    }

    public function trash()
    {
        $title = 'Users';
        $trash = User::onlyTrashed()->get();
        $data = [
            'title' => $title,
            'trash' => $trash
        ];
        return view('admin.user.trash', $data);
    }

    public function restore(string $id)
    {
        User::where('id', '=', $id)->onlyTrashed()->restore();
        Alert::success('Success!', 'The user data has been restored.');
        return redirect()->route('userPage');
    }

    public function restoreAll()
    {
        User::onlyTrashed()->restore();
        Alert::success('Success!', 'All data have been restored.');
        return redirect()->route('userPage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::where('id', '=', $id)->onlyTrashed()->forceDelete();
            Alert::success('Success', 'Successfully deleted');
            return redirect()->route('userPage');
        } catch (Exception $e) {
            Alert::error('Error', 'The data has foreign key');
            return redirect()->route('userPage');
        }
    }
    public function destroyAll()
    {
        try {
            User::onlyTrashed()->forceDelete();
            Alert::success('Success', 'Successfully deleted');
            return redirect()->route('userPage');
        } catch (Exception $e) {
            Alert::error('Error', 'somedata have foreign key');
            return redirect()->route('userPage');
        }
    }
}
