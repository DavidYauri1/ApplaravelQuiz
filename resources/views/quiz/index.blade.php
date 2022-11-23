@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.quiz.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('quiz_create')
                    <a class="btn btn-indigo" href="{{ route('quizzes.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.quiz.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('quiz.index')

    </div>
</div>
@endsection
