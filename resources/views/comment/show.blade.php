@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.comment.title_singular') }}:
                    {{ trans('cruds.comment.fields.id') }}
                    {{ $comment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.id') }}
                            </th>
                            <td>
                                {{ $comment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.name') }}
                            </th>
                            <td>
                                {{ $comment->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $comment->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $comment->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.comment_text') }}
                            </th>
                            <td>
                                {{ $comment->comment_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.question') }}
                            </th>
                            <td>
                                @if($comment->question)
                                    <span class="badge badge-relationship">{{ $comment->question->question_text ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.quiz') }}
                            </th>
                            <td>
                                @if($comment->quiz)
                                    <span class="badge badge-relationship">{{ $comment->quiz->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('comment_edit')
                    <a href="{{ route('comments.edit', $comment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('comments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
