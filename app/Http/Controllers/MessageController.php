<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){
        // pascal case
        $request -> validate([
            'name' => 'required | min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|starts_with:963|digits_between:9,14|',
            'content' => 'required|min:20|string'
        ]);
        $message=new Message();
        $message -> name = $request -> name;
        $message -> email = $request -> email;
        $message -> phone = $request -> phone ;
        $message -> content = $request -> content;
        // save every thing to the Db
        $message -> save();
        return redirect('/#contact');
    }
    public function index(){
        $messages = Message::all();
        return view ('messages.index',compact('messages'));

    }
    public function show(Message $message){
        return view ('messages.show',compact('message'));
    }
    /*
        Route::get('/admin/messages/{id}',function($id){
            $message= Message::findOrFail($id);
            //find is just for id
            return view ('messages.show',compact('message'));
        })->name('messages.show');

        Route::get('/admin/messages/{name}',function($name){
            $message= Message::where('name',$name)->first();
            return view ('messages.show',compact('message'));
        })->name('messages.show');
    */
}
