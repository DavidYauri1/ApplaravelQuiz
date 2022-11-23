@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.testAnswer.title_singular') }}:
                    {{ trans('cruds.testAnswer.fields.id') }}
                    {{ $testAnswer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.id') }}
                            </th>
                            <td>
                                {{ $testAnswer->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.user') }}
                            </th>
                            <td>
                                @if($testAnswer->user)
                                    <span class="badge badge-relationship">{{ $testAnswer->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.test') }}
                            </th>
                            <td>
                                @if($testAnswer->test)
                                    <span class="badge badge-relationship">{{ $testAnswer->test->result ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.question') }}
                            </th>
                            <td>
                                @if($testAnswer->question)
                                    <span class="badge badge-relationship">{{ $testAnswer->question->question_text ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.option') }}
                            </th>
                            <td>
                                @if($testAnswer->option)
                                    <span class="badge badge-relationship">{{ $testAnswer->option->option ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.correct') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $testAnswer->correct ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.text_answer') }}
                            </th>
                            <td>
                                {{ $testAnswer->text_answer }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('test_answer_edit')
                    <a href="{{ route('test-answers.edit', $testAnswer) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('test-answers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
