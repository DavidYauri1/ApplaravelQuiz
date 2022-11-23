<?php

namespace App\Http\Livewire\Front\Quizzes;

use App\Models\Test;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\TestAnswer;
use App\Models\QuestionsOption;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public Quiz $quiz;

    public Collection $questions;

    public Question $currentQuestion;

    public int $currentQuestionIndex = 0;

    public array $questionsAnswers = [];

    public int $startTimeSeconds;

    public function mount()
    {
        $this->startTimeSeconds = now()->timestamp;

        $this->questions = Question::query()
            ->inRandomOrder()
            ->whereHas('quizzes', function ($query) {
                $query->where('id', $this->quiz->id);
            })
            ->with('questionOptions')
            ->get();

        $this->currentQuestion = $this->questions[$this->currentQuestionIndex];
    }

    public function render()
    {
        return view('livewire.front.quizzes.show');
    }

    public function changeQuestion()
    {
        $this->currentQuestionIndex++;
        if ($this->currentQuestionIndex >= $this->questions->count()) {
            return $this->submit();
        }

        $this->currentQuestion = $this->questions[$this->currentQuestionIndex];
    }

    public function submit()
    {
        $result = 0;

        $test = Test::create([
            'user_id' => Auth::id(),
            'quiz_id' => $this->quiz->id,
            'result' => 0,
            'ip_address' => request()->ip(),
            'time_spent' => now()->timestamp - $this->startTimeSeconds
        ]);

        foreach ($this->questionsAnswers as $key => $option) {
            $status = 0;

            if (QuestionsOption::find($option)->correct) {
                $status = 1;
                $result++;
            }

            TestAnswer::create([
                'user_id' => Auth::id(),
                'test_id' => $test->id,
                'question_id' => $this->questions[$key]->id,
                'option_id' => $option,
                'correct' => $status,
            ]);
        }

        $test->update([
            'result' => $result,
        ]);

        return redirect()->route('results.show', $test);
    }
}
