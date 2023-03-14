@extends('layouts.app')
@section('title', 'create task')
@section('content')

    <div class="container">
        <form action="{{ route('task.store') }}" method="POST">
            @include('layouts.TaskForm', ['objective' => 'add'])
        </form>
    </div>
@endsection
