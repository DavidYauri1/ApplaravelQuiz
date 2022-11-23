<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('comment.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.comment.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="comment.name">
        <div class="validation-message">
            {{ $errors->first('comment.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.comment.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('comment.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.comment.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" wire:model.defer="comment.email">
        <div class="validation-message">
            {{ $errors->first('comment.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.comment.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('comment.comment_text') ? 'invalid' : '' }}">
        <label class="form-label required" for="comment_text">{{ trans('cruds.comment.fields.comment_text') }}</label>
        <textarea class="form-control" name="comment_text" id="comment_text" required wire:model.defer="comment.comment_text" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('comment.comment_text') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.comment.fields.comment_text_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('comment.question_id') ? 'invalid' : '' }}">
        <label class="form-label" for="question">{{ trans('cruds.comment.fields.question') }}</label>
        <x-select-list class="form-control" id="question" name="question" :options="$this->listsForFields['question']" wire:model="comment.question_id" />
        <div class="validation-message">
            {{ $errors->first('comment.question_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.comment.fields.question_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('comment.quiz_id') ? 'invalid' : '' }}">
        <label class="form-label" for="quiz">{{ trans('cruds.comment.fields.quiz') }}</label>
        <x-select-list class="form-control" id="quiz" name="quiz" :options="$this->listsForFields['quiz']" wire:model="comment.quiz_id" />
        <div class="validation-message">
            {{ $errors->first('comment.quiz_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.comment.fields.quiz_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('comments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
