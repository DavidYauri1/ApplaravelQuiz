<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Topic;
use Livewire\Component;
use App\Models\QuestionsOption;

class Create extends Component
{
    public Question $question;

    public array $quizzes = [];

    public array $listsForFields = [];

    public array $questionOptions = [];

    public array $quizzes_id = [];

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.question.create');
    }

    public function submit()
    {
        $this->validate();

        $this->question->save();

        foreach ($this->questionOptions as $option) {
            $this->question->questionOptions()->create($option);
        }

        $this->question->quizzes()->sync($this->quizzes_id);

        return redirect()->route('questions.index');
    }

    public function addQuestionsOption()
    {
        $this->questionOptions[] = [
            'option' => '',
            'correct' => false
        ];
    }

    public function removeQuestionsOption($index)
    {
        unset($this->questionOptions[$index]);
        $this->questionOptions = array_values(($this->questionOptions));
    }

    protected function rules(): array
    {
        return [
            'question.question_text' => [
                'string',
                'required',
            ],
            'question.code_snippet' => [
                'string',
                'nullable',
            ],
            'question.answer_explanation' => [
                'string',
                'nullable',
            ],
            'question.more_info_link' => [
                'string',
                'nullable',
            ],
            'question.topic_id' => [
                'integer',
                'exists:topics,id',
                'nullable',
            ],
            'questionOptions' => [
                'required'
            ],
            'questionOptions.*.option' => [
                'required'
            ],
            'quizzes_id' => [
                'array',
                'nullable'
            ]
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['topic']      = Topic::pluck('title', 'id')->toArray();
        $this->listsForFields['quizzes']    = Quiz::pluck('title', 'id')->toArray();
    }
}
