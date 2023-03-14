{{-- <form action="{{ $objective == 'add' ? route('task.store') : route('task.update', ['task' => $task->id]) }}" method="POST"> --}}
{{-- @if ($objective == 'update')
    @method('put')
    @endif --}}
@csrf
<div class="form-group">
    <label for="title">Enter title: </label>
    <input type="text" class="form-control" name="title" id="title" aria-describedby="title_help"
        placeholder="buy bananas" value="{{ $task->title }}">
    <small id="title_help" class="form-text text-muted">enter the title for the task</small>
</div>
<div class="form-group">
    <label for="content">Content: </label>
    <textarea class="form-control" name="content" id="content" rows="3">{{ $task->content }}</textarea>
</div>
{{-- for setting reminder --}}
<div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" value="{{ $task->remind_on }}">
</div>

{{-- submit button --}}
<button type="submit" class="btn btn-primary">{{ $objective }}</button>

{{-- @if ($objective != 'add') --}}
{{-- <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">delete</button>
        </form> --}}
{{-- @endif --}}

{{-- </form> --}}
