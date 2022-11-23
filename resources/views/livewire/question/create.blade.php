<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('question.question_text') ? 'invalid' : '' }}">
        <label class="form-label required" for="question_text">{{ trans('cruds.question.fields.question_text') }}</label>
        <textarea class="form-control" name="question_text" id="question_text" required wire:model.defer="question.question_text" rows="4"></textarea>
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
                <input class="form-control" type="text" name="questions_options_{{ $index }}"
                       id="questions_options_{{ $index }}"
                       wire:model.defer="questionOptions.{{ $index }}.option" autocomplete="off">
                <div class="flex items-center">
                    <input type="checkbox" class="ml-4 mr-1" wire:model.defer="questionOptions.{{ $index }}.correct"> {{ trans('cruds.question.fields.question_options_correct') }}
                    <button wire:click="removeQuestionsOption({{ $index }})" type="button" class="btn btn-secondary ml-4">
                        {{ trans('global.delete') }}
                    </button>
                </div>
            </div>
            @error('questionOptions.*')
                <div class="validation-message mt-2 text-sm">
                    {{ $errors->first('questionOptions.*') }}
                </div>
            @enderror
        @endforeach
        @error('questionOptions')
            <div class="validation-message">
                {{ $errors->first('questionOptions') }}
            </div>
        @enderror

        <button wire:click="addQuestionsOption" type="button" class="btn btn-secondary mt-2">
            {{ trans('global.add') }}
        </button>
    </div>

    <div class="form-group {{ $errors->has('question.code_snippet') ? 'invalid' : '' }}">
        <label class="form-label" for="code_snippet">{{ trans('cruds.question.fields.code_snippet') }}</label>
        <textarea class="form-control" name="code_snippet" id="code_snippet" wire:model.defer="question.code_snippet" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('question.code_snippet') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.code_snippet_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question.answer_explanation') ? 'invalid' : '' }}">
        <label class="form-label" for="answer_explanation">{{ trans('cruds.question.fields.answer_explanation') }}</label>
        <textarea class="form-control" name="answer_explanation" id="answer_explanation" wire:model.defer="question.answer_explanation" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('question.answer_explanation') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.answer_explanation_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question.more_info_link') ? 'invalid' : '' }}">
        <label class="form-label" for="more_info_link">{{ trans('cruds.question.fields.more_info_link') }}</label>
        <input class="form-control" type="text" name="more_info_link" id="more_info_link" wire:model.defer="question.more_info_link">
        <div class="validation-message">
            {{ $errors->first('question.more_info_link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.more_info_link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question.topic_id') ? 'invalid' : '' }}">
        <label class="form-label" for="topic">{{ trans('cruds.question.fields.topic') }}</label>
        <x-select-list class="form-control" id="topic" name="topic" :options="$this->listsForFields['topic']" wire:model="question.topic_id" />
        <div class="validation-message">
            {{ $errors->first('question.topic_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.topic_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('quizzes_id') ? 'invalid' : '' }}">
        <label class="form-label" for="topic">{{ trans('cruds.question.fields.quizzes') }}</label>
        <x-select-list class="form-control" id="quiz" name="quiz" :options="$this->listsForFields['quizzes']" wire:model="quizzes_id" multiple />
        <div class="validation-message">
            {{ $errors->first('quizzes_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.quizzes_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('questions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
