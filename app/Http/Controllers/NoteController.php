<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function create(Request $request){
        
        
        $val = $request -> validate([

            'blog_author'=>'required',
            'blog_title' => 'required',
        ],
        [
            'required'=>'please fill this field'
        ]
     );
        
       
        $notes = new Note;
        $notes->blog_author = $request->input('blog_author');
        $notes->blog_body =$request->input('blog_body');
        $notes->blog_title =$request->input('blog_title');

        $notes->save();

        return response()->json(['msg'=> 'This note has been created', 'status'=>200]);
    }

    public function show(){
        
        $notes = Note::all();

        return response()->json([ 'data'=>$notes ,'msg'=> 'data was succesful fetched', 'status'=>200]);
    }

    public function index($id){

        $note = Note::find($id);

        if($note){
            return response()->json(['data'=>$note, 'msg'=>'data was succesful fetched', 'status'=>200]);
        }else{
            return response()->json(['error'=>'cannot fetch the data', 'msg'=>'data was succesful fetched', 'status'=>404]);
        }

        
    }

    public function update($id, Request $request){

        $val = $request -> validate([

            'blog_author'=>'required',
            'blog_title' => 'required',
        ],
        [
            'required'=>'please fill this field'
        ]);

        $note = Note::find($id);

        if($note){
        $note->blog_author = $request->input('blog_author');
        $note->blog_body =$request->input('blog_body');
        $note->blog_title =$request->input('blog_title');

        $note->update();

        return response()->json(['msg', 'This Note has been updated']);

        }else{
            return response()->json(['msg', 'Failed to ']);
        }

    }

    public function delete($id){
        $note = Note::find($id);
        
        $note->delete();

        return response()->json(['msg'=>'Your Note Has Been Delete']);
    }
}
