<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\ItemUser;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemUserController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_users = ItemUser::where('status', 2)->get();
        $items = Item::all();
        $users = User::all();

        return view('admin.item-borrowers.index', compact('item_users', 'items', 'users'));
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
        $item_user = new ItemUser();
        $item_user->user_id = $request->user_id;
        $item_user->item_id = $request->item_id;
        $item_user->date_start = $request->date_start;
        $item_user->date_end = $request->date_end;
        $item_user->notes = $request->notes;
        $item_user->status = 1;
        $item_user->save();

        return response()->json(['data' => $item_user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_user = ItemUser::find($id);

        return view('admin.item-borrowers.show', compact('item_user'));
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
