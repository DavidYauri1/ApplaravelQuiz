<?php

namespace App\Http\Livewire\Front\Results;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class Comment extends Component
{
    public int $questionId = 0;

    public int $quizId = 0;

    public string $name = '';

    public string $email = '';

    public string $comment = '';

    public Collection $comments;

    public bool $success = false;

    public function mount()
    {
        if (Auth::check()) {
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
    }

    public function render()
    {
        $this->comments = \App\Models\Comment::where('question_id', $this->questionId)->latest()->get();

        return view('livewire.front.results.comment');
    }

    public function submit()
    {
        $this->validate();

        \App\Models\Comment::create([
            'name'         => Auth::user()->name,
            'email'        => Auth::user()->email,
            'comment_text' => $this->comment,
            'question_id'  => $this->questionId,
            'quiz_id'      => $this->quizId,
        ]);

        $this->reset(['comment']);

        if (!Auth::check()) {
            $this->reset(['name', 'email']);
        }

        $this->success = true;
    }

    protected function rules(): array
    {
        return [
            'name'    => ['required', 'string'],
            'email'   => ['required', 'email'],
            'comment' => ['required', 'string', 'min:3']
        ];
    }
}
