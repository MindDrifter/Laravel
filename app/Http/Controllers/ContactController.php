<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller{

    public function submit(ContactRequest $request){
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->mail = $request->input('mail');
        $contact->area = $request->input('area');

        $contact->save();
        return redirect()->route('home')->with('success', 'Успешно');
    }

    public  function allData(){
        return view('contact_messages', ['data' => Contact::all()]);
    }

    public function getOneMessage($id){
        return view('one_message', ['data' => Contact::find($id)]);
    }

    public function updateMessage($id, ContactRequest $request){
        $contact = Contact::find($id);
        $contact->name = $request->input('name');
        $contact->mail = $request->input('mail');
        $contact->area = $request->input('area');
        $contact->save();
        return redirect()->route('contact_messages');

    }
    public function deleteMessage($id){
        $contact = Contact::find($id);
        $contact->delete();


       return redirect()->route('contact_messages')->with('success', 'Удалено');

    }
}
