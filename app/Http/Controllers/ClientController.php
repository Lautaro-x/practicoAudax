<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Client;

class ClientController extends Controller
{
    public function findByUser($id) {
        $client = Client::where('id_User', $id)->get();

        $data = array(
            'status' => 200,
            'message' => $client
        );
        
        return response()->json($data, $data['status']);
    }
}
