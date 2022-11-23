@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.quiz.title_singular') }}:
                    {{ trans('cruds.quiz.fields.id') }}
                    {{ $quiz->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('quiz.edit', [$quiz])
        </div>
    </div>
</div>
@endsection
