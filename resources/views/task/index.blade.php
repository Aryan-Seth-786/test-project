@extends('layouts.app')

@section('title','tasks')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="col-md-10">
            <div class="card border-dark">
                <div class="card-header h3">{{ __("dashboard") }}</div>

                <div class="card-body h4">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session("status") }}
                    </div>
                        @else
                        {{ __('welcome ' . Auth::user()->name) }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    
    {{-- top row --}}
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-dark">
                <div class="card-header h3 text-dark">
                    {{ __("all tasks") }}
                    <div class="d-inline float-right">
                        <a href="{{ route('task.create') }}" class="">+</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- the task list --}}
    {{-- <tasks :tasks="{{ json_encode([
        ['title' => 'title','content' => 'abcdeflsakjdf'],
        ['title' => 'title','content' => 'abcdeflsakjdf'],
        ['title' => 'title','content' => 'abcdeflsakjdf'],
    ]) }}"></tasks> --}}
    
    <tasks :tasks="{{ json_encode($tasks) }}"></tasks>
</div>
@endsection
