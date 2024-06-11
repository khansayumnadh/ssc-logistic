<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\ItemUser;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JsonResponseController extends Controller
{
    public function detailItem($id)
    {
        $item = Item::find($id);

        foreach ($item as $key => $b) {
            $item['item_type_name'] = $item->item_type->name;
        }

        return response()->json(['data' => $item]);
    }

    public function detailUser($id)
    {
        $user = User::find($id);

        foreach ($user as $key => $b) {
            $user['role_type_name'] = $user->role->name;
        }

        return response()->json(['data' => $user]);
    }

    public function approvedItemBorrower($id)
    {
        $item = ItemUser::find($id);

        $item->where('id', $id)->update(['status' => 1]);

        return response()->json(['message' => 'Berhasil menyetujui peminjaman']);
        // return redirect()->route('admin.item-borrowers.index');
    }

    public function notApproveItemBorrower($id)
    {
        $item = ItemUser::find($id);

        $item->where('id', $id)->update(['status' => 3]);

        return response()->json(['message' => 'Berhasil tidak menyetujui peminjaman']);
    }
}
