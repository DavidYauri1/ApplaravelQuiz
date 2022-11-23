<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('quiz.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.quiz.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.lazy="quiz.title">
        <div class="validation-message">
            {{ $errors->first('quiz.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.quiz.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('quiz.slug') ? 'invalid' : '' }}">
        <label class="form-label" for="slug">{{ trans('cruds.quiz.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" wire:model.lazy="quiz.slug">
        <div class="validation-message">
            {{ $errors->first('quiz.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.quiz.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('quiz.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.quiz.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="quiz.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('quiz.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.quiz.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('questions') ? 'invalid' : '' }}">
        <label class="form-label" for="questions">{{ trans('cruds.question.fields.questions') }}</label>
        <x-select-list class="form-control" id="questions" name="questions" :options="$this->listsForFields['questions']" wire:model="questions" multiple />
        <div class="validation-message">
            {{ $errors->first('questions') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.quiz.fields.questions_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('quiz.published') ? 'invalid' : '' }}">
        <label class="form-label" for="published">{{ trans('cruds.quiz.fields.published') }}</label>
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="quiz.published">
        <div class="validation-message">
            {{ $errors->first('quiz.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.quiz.fields.published_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('quiz.public') ? 'invalid' : '' }}">
        <label class="form-label" for="public">{{ trans('cruds.quiz.fields.public') }}</label>
        <input class="form-control" type="checkbox" name="public" id="public" wire:model.defer="quiz.public">
        <div class="validation-message">
            {{ $errors->first('quiz.public') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.quiz.fields.public_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
