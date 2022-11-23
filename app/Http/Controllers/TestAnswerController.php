<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\TestAnswer;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class TestAnswerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('test_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('test-answer.index');
    }

    public function create()
    {
        abort_if(Gate::denies('test_answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('test-answer.create');
    }

    public function edit(TestAnswer $testAnswer)
    {
        abort_if(Gate::denies('test_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('test-answer.edit', compact('testAnswer'));
    }

    public function show(TestAnswer $testAnswer)
    {
        abort_if(Gate::denies('test_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testAnswer->load('user', 'test', 'question', 'option');

        return view('test-answer.show', compact('testAnswer'));
    }
}
