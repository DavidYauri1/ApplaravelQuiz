@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="card bg-white w-full">
            <div class="card-header">
                <div class="card-row">
                    <h6 class="card-title">
                        Leaderboard
                    </h6>
                </div>
            </div>

            <div class="card-body">
                @livewire('front.leaderboard')
            </div>
        </div>
    </div>

@endsection
