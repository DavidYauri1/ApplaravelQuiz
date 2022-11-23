@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    My Results
                </h6>
            </div>
        </div>
        @livewire('front.results.index')

    </div>
</div>
@endsection
