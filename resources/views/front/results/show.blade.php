@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="w-full card bg-blueGray-100">
            <div class="card-header">
                <div class="card-row">
                    <h6 class="card-title">
                        My Results
                    </h6>
                </div>
            </div>

            <div class="card-body">
                <table class="table mt-4 w-full table-view">
                    <tbody class="bg-white">
                        @if(auth()->user()?->is_admin)
                            <tr class="w-28">
                                <th>User</th>
                                <td>{{ $test->user->name ?? '' }} ({{ $test->user->email ?? '' }})</td>
                            </tr>
                        @endif
                        <tr class="w-28">
                            <th>Date</th>
                            <td>{{ $test->created_at ?? '' }}</td>
                        </tr>
                        <tr class="w-28">
                            <th>Result</th>
                            <td>
                                {{ $test->result }} / {{ $total_questions }}
                                @if($test->time_spent)
                                    (time: {{ intval($test->time_spent / 60) }}:{{ gmdate('s', $test->time_spent) }}
                                    minutes)
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if($users)
            <div class="w-full card bg-blueGray-100">
                <div class="card-header">
                    <div class="card-row">
                        <h6 class="card-title">
                            Leaderboard
                        </h6>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table mt-4 w-full table-view">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Username</th>
                                <th>Correct answers</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($users as $user)
                                <tr class="@if(auth()->user() && auth()->user()->name == $user->name) bg-blueGray-300 @endif">
                                    <td class="w-9">{{ $loop->iteration }}</td>
                                    <td class="w-1/2">{{ $user->name }}</td>
                                    <td>{{ $user->correct }} / {{ $total_questions }}
                                        (time: {{ intval($user->time_spent / 60) }}:{{ gmdate('s', $user->time_spent) }} minutes)</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No results</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <div class="w-full card bg-blueGray-100">
                <div class="card-header">
                    <div class="card-row">
                        <h6 class="card-title">
                            Questions and Answers
                        </h6>
                        @guest
                            Want to take more quizzes and get on leaderboard? <a href="{{ route('register') }}" class="btn btn-success btn-sm">Register</a> here!
                        @endguest
                    </div>
                </div>

                <div class="card-body">
                    @foreach($results as $result)
                        <table class="table table-view w-full my-4 bg-white">
                            <tbody class="bg-white">
                                <tr class="bg-blueGray-300">
                                    <td class="w-1/2">Question #{{ $loop->iteration }}</td>
                                    <td>{!! nl2br($result->question->question_text) !!}</td>
                                </tr>
                                <tr>
                                    <td>Options</td>
                                    <td>
                                        @foreach($result->question->questionOptions as $option)
                                            <li class="@if ($result->option_id == $option->id) underline @endif @if ($option->correct == 1) font-bold @endif">{{ $option->option }}
                                                @if ($option->correct == 1) <em>(correct answer)</em> @endif
                                                @if ($result->option_id == $option->id) <em>(your
                                                    answer)</em> @endif
                                            </li>
                                        @endforeach
                                    </td>
                                </tr>
                                @if($result->question->answer_explanation || $result->question->more_info_link)
                                    <tr>
                                        <td>Answer Explanation</td>
                                        <td>
                                            {!! $result->question->answer_explanation  !!}
                                            @if ($result->question->more_info_link)
                                                <div class="mt-4">
                                                    Read more:
                                                    <a href="{{ $result->question->more_info_link }}" class="hover:underline" target="_blank">
                                                        {{ $result->question->more_info_link }}
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        @livewire('front.results.comment', ['questionId' => $result->question->id, 'quizId' => $test->quiz->id])

                        @if(!$loop->last)
                            <hr class="my-4 md:min-w-full">
                        @endif
                    @endforeach
                </div>
        </div>
    </div>

@endsection
