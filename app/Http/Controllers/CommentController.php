<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewCommentPosted;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {

        $data = $request->validated();

        $comment=Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment,
        ]);
        $post = $comment->post;

        $details= auth()->user()->name . ' added a comment on your post';

        $postAuthor = $post->user;

        $postAuthor->notify(new NewCommentPosted($comment));
        // Mail::to($sales_mail)->queue( new SendMail($details, $subject_sales="Comment"));

        return back()->with('success', 'Comment Added successfully.');

    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id === Auth::id()) {
            $comment->delete();
        }

        return back();
    }
}
