@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.quiz.title_singular') }}:
                    {{ trans('cruds.quiz.fields.id') }}
                    {{ $quiz->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.quiz.fields.id') }}
                            </th>
                            <td>
                                {{ $quiz->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.quiz.fields.title') }}
                            </th>
                            <td>
                                {{ $quiz->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.quiz.fields.slug') }}
                            </th>
                            <td>
                                {{ $quiz->slug }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.quiz.fields.description') }}
                            </th>
                            <td>
                                {{ $quiz->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.quiz.fields.published') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $quiz->published ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.quiz.fields.public') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $quiz->public ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('quiz_edit')
                    <a href="{{ route('quizzes.edit', $quiz) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
