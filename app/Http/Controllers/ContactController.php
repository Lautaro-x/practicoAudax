<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contact;
use App\Client;

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
    
    public function findByUser($id){
        
        $contact = Client::Select('clients.id as id_client', 'clients.name as name_client', 'contacts.id as id_contact', 'contacts.name as name_contact')
                   ->join('contacts', 'clients.id', '=', 'contacts.id_client')
                   ->get();
        $data = array(
            'status' => 200,
            'message' => $contact
        );
        
        return response()->json($data, $data['status']);
        
    }
}
