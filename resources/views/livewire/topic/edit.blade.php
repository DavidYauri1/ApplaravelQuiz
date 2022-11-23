<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('topic.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.topic.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="topic.title">
        <div class="validation-message">
            {{ $errors->first('topic.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.topic.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('topics.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
