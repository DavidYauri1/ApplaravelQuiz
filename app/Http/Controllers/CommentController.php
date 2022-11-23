<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Comment;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class CommentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('comment.index');
    }

    public function create()
    {
        abort_if(Gate::denies('comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('comment.create');
    }

    public function edit(Comment $comment)
    {
        abort_if(Gate::denies('comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('comment.edit', compact('comment'));
    }

    public function show(Comment $comment)
    {
        abort_if(Gate::denies('comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comment->load('question', 'quiz');

        return view('comment.show', compact('comment'));
    }
}
