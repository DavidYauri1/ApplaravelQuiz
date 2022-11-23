@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.topic.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('topic_create')
                    <a class="btn btn-indigo" href="{{ route('topics.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.topic.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('topic.index')

    </div>
</div>
@endsection
