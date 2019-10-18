<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Http\Requests\CreateCommentRequest;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index() {
        if(auth()->user()->isAdmin()){
            $comments = Comment::paginate(50);
        }else{
            $comments = auth()->user()->comments()->visible()->paginate(50);
            //$comments = Comment::where('user_id', auth()->user()->id)->paginate(50);
        }
        
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::visible()->get();
        $tasks = Task::visible()->get();
        return view('admin.comments.create', compact('users', 'tasks'));
    }

    public function store(CreateCommentRequest $request) {
        $comment =Comment::create(request()->all());   
       
        return redirect('admin/comments');
    }

    public function edit(Comment $comment)
    {
        $comment->load('user');

        if (!$comment->canMakeChanges()){
            return redirect('admin/comments');
        }

        $users = User::visible()->get();
         $tasks = Task::visible()->get();
        return view('admin.comments.edit', compact('comment', 'users', 'tasks'));
    }

    
    public function update(Request $request, Comment $comment)
    {
    
        if (!$comment->canMakeChanges()){
            return redirect('admin/comments');
        }

        $comment->update(request()->all());
        
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ($comment->canMakeChanges()){
            $comment->delete();
        }

       
        return redirect('admin/comments');
    
    }
}
