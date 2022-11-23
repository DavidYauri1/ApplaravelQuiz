<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Response;
use App\Models\QuestionsOption;
use function view;
use function abort_if;

class QuestionsOptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('questions_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('questions-option.index');
    }

    public function create()
    {
        abort_if(Gate::denies('questions_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('questions-option.create');
    }

    public function edit(QuestionsOption $questionsOption)
    {
        abort_if(Gate::denies('questions_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('questions-option.edit', compact('questionsOption'));
    }

    public function show(QuestionsOption $questionsOption)
    {
        abort_if(Gate::denies('questions_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionsOption->load('question');

        return view('questions-option.show', compact('questionsOption'));
    }
}
