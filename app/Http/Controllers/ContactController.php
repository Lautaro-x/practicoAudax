<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contact;

class ContactController extends Controller
{
    public function findByClient($id) {
        $contact = Contact::where('id_Client', $id)->get();

        $data = array(
            'status' => 200,
            'message' => $contact
        );
        
        return response()->json($data, $data['status']);
    }
}
