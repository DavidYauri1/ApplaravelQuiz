<div class="mt-4"
     x-data="{ secondsLeft: {{ config('quiz.secondsPerQuestion') }} }"
     x-init="setInterval(() => { if (secondsLeft > 1) { secondsLeft--; } else { secondsLeft = {{ config('quiz.secondsPerQuestion') }}; $wire.changeQuestion(); } }, 1000);">
    Time left for this question: <span x-text="secondsLeft" class="font-bold"></span> sec.
    <br/><br/>
    <b>Question {{ $currentQuestionIndex+1 }} of {{ $this->questions->count() }}:</b>
    <h2 class="mb-4 text-2xl">{{ $currentQuestion->question_text }}</h2>

    @if ($currentQuestion->code_snippet)
        <pre class="mb-4 border-2 border-solid p-2">{{ $currentQuestion->code_snippet }}</pre>
    @endif

    @foreach($currentQuestion->questionOptions as $option)
        <div>
            <label for="option.{{ $option->id }}">
                <input type="radio"
                       id="option.{{ $option->id }}"
                       wire:model.defer="questionsAnswers.{{ $currentQuestionIndex }}"
                       name="questionsAnswers.{{ $currentQuestionIndex }}"
                       value="{{ $option->id }}">
                {{ $option->option }}
            </label>
        </div>
    @endforeach

    @if ($currentQuestionIndex < $this->questions->count() - 1)
        <div class="mt-4">
            <button class="btn btn-secondary" x-on:click="{ secondsLeft = {{ config('quiz.secondsPerQuestion') }}; $wire.changeQuestion(); }">Next
                question
            </button>
        </div>
    @else
        <div class="mt-4">
            <button class="btn btn-indigo" wire:click="submit">Submit</button>
        </div>
    @endif
</div>
