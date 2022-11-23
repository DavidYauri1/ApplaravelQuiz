@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.test.title_singular') }}:
                    {{ trans('cruds.test.fields.id') }}
                    {{ $test->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.id') }}
                            </th>
                            <td>
                                {{ $test->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.user') }}
                            </th>
                            <td>
                                @if($test->user)
                                    <span class="badge badge-relationship">{{ $test->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.quiz') }}
                            </th>
                            <td>
                                @if($test->quiz)
                                    <span class="badge badge-relationship">{{ $test->quiz->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.result') }}
                            </th>
                            <td>
                                {{ $test->result }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.ip_address') }}
                            </th>
                            <td>
                                {{ $test->ip_address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.test.fields.time_spent') }}
                            </th>
                            <td>
                                {{ $test->time_spent }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('test_edit')
                    <a href="{{ route('tests.edit', $test) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('tests.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
