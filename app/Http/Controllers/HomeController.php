<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use function view;

class HomeController
{
    public function index()
    {
        $query = Quiz::withCount(['questions', 'tests'])
            ->has('questions')
            ->when(Auth::guest() || !Auth::user()->admins(), function($query) {
                return $query->where('published', 1);
            })
            ->orderBy('id', 'asc')
            ->get();

        $public = $query->where('public', true);
        $registered = $query->where('public', false);

        return view('home', compact('public', 'registered'));
    }

    public function show(Quiz $quiz, $slug = '')
    {
        return view('front.quizzes.show', compact( 'quiz'));
    }
}
