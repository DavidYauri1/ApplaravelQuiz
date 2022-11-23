<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use App\Models\Test;
use Livewire\Livewire;
use App\Http\Livewire\Test\Edit;
use App\Http\Livewire\Test\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestsTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminCanCreateTest()
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(Create::class)
            ->set('test.user_id', 1)
            ->call('submit')
            ->assertSet('test.user_id', 1)
            ->assertHasNoErrors(['test.user_id', 'test.quiz_id', 'test.result', 'test.ip_address', 'test.time_spent'])
            ->assertRedirect(route('tests.index'));

        $this->assertTrue(Test::where('user_id', 1)->exists());
    }

    public function testUserIdExistsRule()
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(Create::class)
            ->set('test.user_id', 9999)
            ->call('submit')
            ->assertHasErrors(['test.user_id' => 'exists']);
    }

    public function testAdminCanEditComment()
    {
        $this->actingAs(User::factory()->admin()->create());

        $user = User::factory()->create();

        $test = Test::factory()->create();

        \Log::info($test);

        Livewire::test(Edit::class, [$test])
            ->set('test.user_id', $user->id)
            ->call('submit')
            ->assertSet('test.user_id', $user->id)
            ->assertHasNoErrors(['test.user_id', 'test.quiz_id', 'test.result', 'test.ip_address', 'test.time_spent'])
            ->assertRedirect(route('tests.index'));

        $this->assertTrue(Test::where('user_id', $user->id)->exists());
    }
}
