<?php

namespace App\Http\Livewire\Quiz;

use App\Models\Quiz;
use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Str;

class Create extends Component
{
    public Quiz $quiz;

    public array $questions = [];

    public array $listsForFields;

    public function mount(Quiz $quiz)
    {
        $this->quiz = $quiz;

        $this->initListsForFields();

        $this->quiz->published = false;
        $this->quiz->public = false;
    }

    public function render()
    {
        return view('livewire.quiz.create');
    }

    public function updatedQuizTitle()
    {
        $this->quiz->slug = Str::slug($this->quiz->title);
    }

    public function submit()
    {
        $this->validate();

        $this->quiz->save();

        $this->quiz->questions()->sync($this->questions);

        return redirect()->route('quizzes.index');
    }

    protected function rules(): array
    {
        return [
            'quiz.title' => [
                'string',
                'required',
            ],
            'quiz.slug' => [
                'string',
                'nullable',
            ],
            'quiz.description' => [
                'string',
                'nullable',
            ],
            'quiz.published' => [
                'boolean',
            ],
            'quiz.public' => [
                'boolean',
            ],
            'questions' => [
                'array'
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['questions'] = Question::pluck('question_text', 'id')->toArray();
    }
}
