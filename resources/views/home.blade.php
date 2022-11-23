@extends('layouts.app')
@section('content')

<div class="row">
    <div class="w-full card bg-blueGray-100">
        <div class="card-header">
            <div class="card-row">
                <h6 class="card-title">
                    Public quizzes
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="flex flex-wrap pt-3">
                @foreach($public as $quiz)
                    <div class="px-4 py-2 w-full lg:w-6/12 xl:w-3/12">
                        <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg xl:mb-0">
                            <div class="flex-auto p-4">
                                <a href="{{ route('quiz.show', [$quiz, $quiz->slug]) }}">{{ $quiz->title }}</a>
                                <p class="text-sm">Questions: <span>{{ $quiz->questions_count }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="w-full card bg-blueGray-100">
        <div class="card-header">
            <div class="card-row">
                <h6 class="card-title">
                    Quizzes for Registered Users
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="flex flex-wrap pt-3">
                @foreach($registered as $quiz)
                    <div class="px-4 py-2 w-full lg:w-6/12 xl:w-3/12">
                        <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg xl:mb-0">
                            <div class="flex-auto p-4">
                                <a href="{{ route('quiz.show', [$quiz, $quiz->slug]) }}">{{ $quiz->title }}</a>
                                <p class="text-sm">Questions: <span>{{ $quiz->questions_count }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
