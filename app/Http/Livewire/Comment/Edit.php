<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\TestAnswer;
use Livewire\Component;

class Edit extends Component
{
    public Comment $comment;

    public array $listsForFields = [];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.comment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->comment->save();

        return redirect()->route('comments.index');
    }

    protected function rules(): array
    {
        return [
            'comment.name' => [
                'string',
                'nullable',
            ],
            'comment.email' => [
                'email:rfc',
                'nullable',
            ],
            'comment.comment_text' => [
                'string',
                'required',
            ],
            'comment.question_id' => [
                'integer',
                'exists:questions,id',
                'nullable',
            ],
            'comment.quiz_id' => [
                'integer',
                'exists:quizzes,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['question']    = Question::pluck('question_text', 'id')->toArray();
        $this->listsForFields['quiz']        = Quiz::pluck('title', 'id')->toArray();
    }
}
