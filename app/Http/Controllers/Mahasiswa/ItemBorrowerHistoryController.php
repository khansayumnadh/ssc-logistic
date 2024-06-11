<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemUser;
use Illuminate\Http\Request;

class ItemBorrowerHistoryController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_items = ItemUser::where('user_id', auth()->user()->id)->get();
        $items = Item::orderBy('title', 'ASC')->get();

        return view('mahasiswa.item-borrowers-history.index', compact('my_items', 'items'));
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
        // $item_user = new ItemUser();
        // $item_user->user_id = $request->user_id;
        // $item_user->item_id = $request->item_id;
        // $item_user->date_start = $request->date_start;
        // $item_user->date_end = $request->date_end;
        // $item_user->notes = $request->notes;
        // $item_user->status = 2;
        // $item_user->save();

        // return redirect()->route('mahasiswa.item-borrowers-history.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_user = ItemUser::findOrFail($id);

        if ($item_user->user_id !== auth()->user()->id) {
            return abort(404);
        }

        return view('mahasiswa.item-borrowers-history.show', compact('item_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
