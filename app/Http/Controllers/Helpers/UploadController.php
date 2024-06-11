<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function imageUpload($image, $location)
    {
        $random = rand(1000000000, 9999999999) . '_' . date('dmY') . '_' . $image->getClientOriginalName();
        $destination = public_path($location);
        $image->move($destination, $random);

        $url = $location . $random;

        return $url;
    }
}
