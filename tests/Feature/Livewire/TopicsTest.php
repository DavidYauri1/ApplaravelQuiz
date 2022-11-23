<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use App\Models\Topic;
use Livewire\Livewire;
use App\Http\Livewire\Topic\Edit;
use App\Http\Livewire\Topic\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopicsTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminCanCreateTopic()
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(Create::class)
            ->set('topic.title', 'top secret topic')
            ->call('submit')
            ->assertSet('topic.title', 'top secret topic')
            ->assertHasNoErrors(['topic.title'])
            ->assertRedirect(route('topics.index'));

        $this->assertTrue(Topic::where('title', 'top secret topic')->exists());
    }

    public function testTitleIsRequired()
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(Create::class)
            ->set('topic.title', '')
            ->call('submit')
            ->assertHasErrors(['topic.title' => 'required']);

        Livewire::test(Edit::class)
            ->set('topic.title', '')
            ->call('submit')
            ->assertHasErrors(['topic.title' => 'required']);
    }

    public function testAdminCanEditTopic()
    {
        $this->actingAs(User::factory()->admin()->create());

        $topic = Topic::factory()->create();

        Livewire::test(Edit::class, [$topic])
            ->set('topic.title', 'top secret topic')
            ->call('submit')
            ->assertSet('topic.title', 'top secret topic')
            ->assertHasNoErrors(['topic.title'])
            ->assertRedirect(route('topics.index'));

        $this->assertTrue(Topic::where('title', 'top secret topic')->exists());
    }
}
