<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, Comment::$rules);
        
        $comment = new Comment;
        $form = $request->all();
        $comment->fill($form);
        $comment->save();
        
        return redirect('/');
    }
}
