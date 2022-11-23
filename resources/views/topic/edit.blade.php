@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.topic.title_singular') }}:
                    {{ trans('cruds.topic.fields.id') }}
                    {{ $topic->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('topic.edit', [$topic])
        </div>
    </div>
</div>
@endsection
