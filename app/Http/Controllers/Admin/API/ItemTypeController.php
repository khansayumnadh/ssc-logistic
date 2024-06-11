<?php

namespace App\Http\Controllers\Admin\API;

use App\Models\ItemType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemTypeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => ItemType::find($id)
        ], Response::HTTP_OK);
    }
}
