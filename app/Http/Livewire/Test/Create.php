<?php

namespace App\Http\Livewire\Test;

use App\Models\Quiz;
use App\Models\Test;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Test $test;

    public array $listsForFields = [];

    public function mount(Test $test)
    {
        $this->test = $test;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.test.create');
    }

    public function submit()
    {
        $this->validate();

        $this->test->save();

        return redirect()->route('tests.index');
    }

    protected function rules(): array
    {
        return [
            'test.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'test.quiz_id' => [
                'integer',
                'exists:quizzes,id',
                'nullable',
            ],
            'test.result' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'test.ip_address' => [
                'string',
                'nullable',
            ],
            'test.time_spent' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['quiz'] = Quiz::pluck('title', 'id')->toArray();
    }
}
