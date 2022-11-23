@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.topic.title_singular') }}:
                    {{ trans('cruds.topic.fields.id') }}
                    {{ $topic->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.topic.fields.id') }}
                            </th>
                            <td>
                                {{ $topic->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.topic.fields.title') }}
                            </th>
                            <td>
                                {{ $topic->title }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('topic_edit')
                    <a href="{{ route('topics.edit', $topic) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('topics.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
