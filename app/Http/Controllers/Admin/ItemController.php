<?php

namespace App\Http\Controllers\Admin;

use App\Models\item;
use App\Models\category;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = Item::paginate(5);
        $c = Category::all();
        $data = [
            'title' => 'Items',
            'item' => $i,
            'category' => $c
        ];

        return view('admin.item.item', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'condition' => 'required'
        ]);

        try {
            Item::create([
                'code' => uniqid(),
                'name' => $request->item,
                'stock' => $request->stock,
                'condition' => $request->condition,
                'category_id' => $request->category
            ]);

            Alert::success('Success!', 'The item data has been saved successfully.');
            return redirect()->route('itemPage');
        } catch(Exception $e) {
            Alert::error('Error!', 'Failed to save the data.');
            return redirect()->route('itemPage');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id)->update([
            'name' => $request->item,
            'category_id' => $request->category,
            'stock' => $request->stock,
            'condition' => $request->condition,
        ]);

         Alert::success('Success!', 'The item data has been updated successfully.');
         return redirect()->route('itemPage');
        
    }

    /**
     * Move to trash.
     */
    public function delete(string $id) 
    {
        Item::find($id)->delete();
        Alert::success('Success!', 'Item has move in trash.');
        return redirect()->route('itemPage');
    }

    /**
     * Trash
     */
    public function trash()
    {
        $t = item::onlyTrashed()->get();
        $data = [
            'title' => 'Items',
            'trash' => $t
        ];
        return view('admin.item.trash', $data);
    }

    /**
     * Restore an item from trash
     */
    public function restore(String $id)
    {

    }

    /**
     * Restore all item from trash
     */
      public function restoreAll()
    {

    }

    /**
     * Remove permanent item
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyAll()
    {
        //
    }
}
