@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.question.title_singular') }}:
                    {{ trans('cruds.question.fields.id') }}
                    {{ $question->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.question.fields.id') }}
                            </th>
                            <td>
                                {{ $question->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.question.fields.question_text') }}
                            </th>
                            <td>
                                {{ $question->question_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.question.fields.code_snippet') }}
                            </th>
                            <td>
                                {{ $question->code_snippet }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.question.fields.answer_explanation') }}
                            </th>
                            <td>
                                {{ $question->answer_explanation }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.question.fields.more_info_link') }}
                            </th>
                            <td>
                                {{ $question->more_info_link }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.question.fields.topic') }}
                            </th>
                            <td>
                                @if($question->topic)
                                    <span class="badge badge-relationship">{{ $question->topic->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.question.fields.question_options') }}
                            </th>
                            <td>
                                @foreach($question->questionOptions as $key => $entry)
                                    <div>
                                        <span class="badge badge-relationship @if($entry->correct == 1) text-white bg-green-500 @endif">{{ $entry->option }}</span>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('question_edit')
                    <a href="{{ route('questions.edit', $question) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('questions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
