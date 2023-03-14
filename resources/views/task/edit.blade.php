@extends('layouts.app')
@section('title', 'create task')
@section('content')

    <div class="container">
        <form action="{{ route('task.update', ['task' => $task->id]) }}" method="POST">
            @method('put')
            @include('layouts.TaskForm', ['objective' => 'update'])
            <button type="button" class="btn btn-danger" onclick="submit_form()">delete</button>
        </form>
        <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post" id="del_form">
            @csrf
            @method('delete')
            {{-- <button type="button" class="btn btn-danger" onclick="submit_form(this)">delete</button> --}}
        </form>
    </div>
    <script>
        function submit_form(){
            let a = document.querySelector(`#del_form`);
            console.log(a.submit());
        }
    </script>
@endsection
