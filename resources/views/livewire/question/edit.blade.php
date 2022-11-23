<form wire:submit.prevent="submit" class="pt-3">

    @if($disabled)
        <div class="relative px-6 py-4 mb-4 text-white rounded border-0 bg-lightBlue-500">
            <span class="inline-block mr-5 text-xl align-middle">
                <i class="fas fa-bell"></i>
            </span>
            <span class="inline-block mr-8 align-middle">
                Cannot edit this question anymore because it has answers
            </span>
        </div>
    @endif

    <div class="form-group {{ $errors->has('question.question_text') ? 'invalid' : '' }}">
        <label class="form-label required" for="question_text">{{ trans('cruds.question.fields.question_text') }}</label>
        <textarea class="form-control" name="question_text" id="question_text" required wire:model.defer="question.question_text" rows="4" @if($disabled) disabled @endif></textarea>
        <div class="validation-message">
            {{ $errors->first('question.question_text') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.question_text_helper') }}
        </div>
    </div>

    <div class="form-group {{ $errors->has('questionOptions.*') ? 'invalid' : '' }}">
        <label class="form-label required" for="question_text">{{ trans('cruds.question.fields.question_options') }}</label>
        @foreach($questionOptions as $index => $questionOption)
            <div class="flex mt-2">
                <input class="form-control" type="text" name="questions_options_{{ $index }}" id="questions_options_{{ $index }}" wire:model.defer="questionOptions.{{ $index }}.option" autocomplete="off" @if($disabled) disabled @endif>
                <div class="flex items-center">
                    <input type="checkbox" class="mr-1 ml-4" wire:model.defer="questionOptions.{{ $index }}.correct" @if($disabled) disabled @endif> {{ trans('cruds.question.fields.question_options_correct') }}
                    @if(!$disabled)
                        <button wire:click="removeQuestionsOption({{ $index }})" type="button" class="ml-4 btn btn-secondary">
                            {{ trans('global.delete') }}
                        </button>
                    @endif
                </div>
            </div>
            <div class="validation-message">
                {{ $errors->first('questionOptions.' . $index) }}
            </div>
        @endforeach

        @if(!$disabled)
            <button wire:click="addQuestionsOption" type="button" class="mt-2 btn btn-secondary">
                {{ trans('global.add') }}
            </button>
        @endif
    </div>

    <div class="form-group {{ $errors->has('question.code_snippet') ? 'invalid' : '' }}">
        <label class="form-label" for="code_snippet">{{ trans('cruds.question.fields.code_snippet') }}</label>
        <textarea class="form-control" name="code_snippet" id="code_snippet" wire:model.defer="question.code_snippet" rows="4" @if($disabled) disabled @endif></textarea>
        <div class="validation-message">
            {{ $errors->first('question.code_snippet') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.code_snippet_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question.answer_explanation') ? 'invalid' : '' }}">
        <label class="form-label" for="answer_explanation">{{ trans('cruds.question.fields.answer_explanation') }}</label>
        <textarea class="form-control" name="answer_explanation" id="answer_explanation" wire:model.defer="question.answer_explanation" rows="4" @if($disabled) disabled @endif></textarea>
        <div class="validation-message">
            {{ $errors->first('question.answer_explanation') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.answer_explanation_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question.more_info_link') ? 'invalid' : '' }}">
        <label class="form-label" for="more_info_link">{{ trans('cruds.question.fields.more_info_link') }}</label>
        <input class="form-control" type="text" name="more_info_link" id="more_info_link" wire:model.defer="question.more_info_link" @if($disabled) disabled @endif>
        <div class="validation-message">
            {{ $errors->first('question.more_info_link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.more_info_link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question.topic_id') ? 'invalid' : '' }}">
        <label class="form-label" for="topic">{{ trans('cruds.question.fields.topic') }}</label>
        @if($disabled)
            <input class="form-control" type="text" id="topic" value="{{ $question->topic->title }}" disabled>
        @else
            <x-select-list class="form-control" id="topic" name="topic" :options="$this->listsForFields['topic']" wire:model="question.topic_id" />
        @endif
        <div class="validation-message">
            {{ $errors->first('question.topic_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.topic_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('quizzes_id') ? 'invalid' : '' }}">
        <label class="form-label" for="quiz">{{ trans('cruds.question.fields.quizzes') }}</label>
        @if($disabled)
            <input class="form-control" type="text" id="quiz" value="@foreach($question->quizzes as $quiz) {{ $quiz->title }}@if (!$loop->last),@endif @endforeach" disabled>
        @else
            <x-select-list class="form-control" id="quiz" name="quiz" :options="$this->listsForFields['quizzes']" wire:model="quizzes_id" multiple />
        @endif
        <div class="validation-message">
            {{ $errors->first('quizzes_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.quizzes_helper') }}
        </div>
    </div>

    <div class="form-group">
        @if(!$disabled)
            <button class="mr-2 btn btn-indigo" type="submit">
                {{ trans('global.save') }}
            </button>
        @endif
        <a href="{{ route('questions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
