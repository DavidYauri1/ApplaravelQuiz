<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Question;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class QuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('question.index');
    }

    public function create()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('question.create');
    }

    public function edit(Question $question)
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('question.edit', compact('question'));
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->load('topic', 'quizzes');

        return view('question.show', compact('question'));
    }
}
