<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Question;
use App\Http\Livewire\Question\Edit;
use App\Http\Livewire\Question\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionsTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminCanCreateQuestion()
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(Create::class)
            ->set('question.question_text', 'very secret question')
            ->set('questionOptions.0.option', 'first answer')
            ->call('submit')
            ->assertHasNoErrors(['question.question_text', 'question.code_snippet', 'question.answer_explanation', 'question.more_info_link', 'question.topic_id', 'questionOptions', 'questionOptions.*.option'])
            ->assertRedirect(route('questions.index'));

        $this->assertTrue(Question::where('question_text', 'very secret question')->exists());
    }

    public function testQuestionTextIsRequired()
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(Create::class)
            ->set('question.question_text', '')
            ->call('submit')
            ->assertHasErrors(['question.question_text' => 'required']);

        Livewire::test(Edit::class)
            ->set('question.question_text', '')
            ->call('submit')
            ->assertHasErrors(['question.question_text' => 'required']);
    }

    public function testAdminCanEditQuestion()
    {
        $this->actingAs(User::factory()->admin()->create());

        $question = Question::factory()->create();

        Livewire::test(Edit::class, [$question])
            ->set('question.question_text', 'very secret question')
            ->call('submit')
            ->assertHasNoErrors(['question.question_text', 'question.code_snippet', 'question.answer_explanation', 'question.more_info_link', 'question.topic_id', 'questionOptions', 'questionOptions.*.option'])
            ->assertRedirect(route('questions.index'));

        $this->assertTrue(Question::where('question_text', 'very secret question')->exists());
    }
}
