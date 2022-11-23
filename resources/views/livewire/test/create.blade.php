<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('test.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.test.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="test.user_id" />
        <div class="validation-message">
            {{ $errors->first('test.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.quiz_id') ? 'invalid' : '' }}">
        <label class="form-label" for="quiz">{{ trans('cruds.test.fields.quiz') }}</label>
        <x-select-list class="form-control" id="quiz" name="quiz" :options="$this->listsForFields['quiz']" wire:model="test.quiz_id" />
        <div class="validation-message">
            {{ $errors->first('test.quiz_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.quiz_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.result') ? 'invalid' : '' }}">
        <label class="form-label" for="result">{{ trans('cruds.test.fields.result') }}</label>
        <input class="form-control" type="number" name="result" id="result" wire:model.defer="test.result" step="1">
        <div class="validation-message">
            {{ $errors->first('test.result') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.result_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.ip_address') ? 'invalid' : '' }}">
        <label class="form-label" for="ip_address">{{ trans('cruds.test.fields.ip_address') }}</label>
        <input class="form-control" type="text" name="ip_address" id="ip_address" wire:model.defer="test.ip_address">
        <div class="validation-message">
            {{ $errors->first('test.ip_address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.ip_address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.time_spent') ? 'invalid' : '' }}">
        <label class="form-label" for="time_spent">{{ trans('cruds.test.fields.time_spent') }}</label>
        <input class="form-control" type="number" name="time_spent" id="time_spent" wire:model.defer="test.time_spent" step="1">
        <div class="validation-message">
            {{ $errors->first('test.time_spent') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.time_spent_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('tests.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
