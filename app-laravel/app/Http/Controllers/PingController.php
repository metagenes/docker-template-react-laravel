<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Support\Str;
 
class PingController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        $data = [
            'message' => 'Success',
            'status' => 200,
            'ref_id' => Str::uuid(),
        ];

        return response()->json($data,200);
    }
}