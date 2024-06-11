<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\ItemType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\UploadController;
use Illuminate\Http\Request;
use File;

class ItemController extends Controller
{
    private $helpers;

    /**
     * Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->helpers = new UploadController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $item_types = ItemType::all();
        return view('admin.items.index', compact('items', 'item_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $location = 'assets/images/items/';

        $item = new Item();
        $item->item_type_id = $request->item_type_id;
        $item->item_number = 'ITM-' . rand(10, 90) . rand(101, 199) . rand(200, 999);
        $item->image = $this->helpers->imageUpload($image, $location);
        $item->title = $request->title;
        $item->location = $request->location;
        $item->date_of_added = $request->date_of_added;
        $item->save();

        return redirect()->route('admin.items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);

        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $item_types = ItemType::all();

        return view('admin.items.edit', compact('item', 'item_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $location = 'assets/images/items/';
        $item = Item::find($id);

        if (!empty($image)) {
            if (File::exists($item->image)) {
                File::delete($item->image);
            }
        }

        if ($image !== null) {
            $item->image = $this->helpers->imageUpload($image, $location);
        }

        $item->item_type_id = $request->item_type_id;
        $item->item_number = $request->item_number;
        $item->title = $request->title;
        $item->location = $request->location;
        $item->date_of_added = $request->date_of_added;
        $item->save();

        return view('admin.items.show', compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        $path = public_path($item->image);

        if (File::exists($path)) {
            File::delete($path);
        }

        $item->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
