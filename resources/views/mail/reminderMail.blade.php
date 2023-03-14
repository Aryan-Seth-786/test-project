@component('mail::message')
Hi! {{ $task->user->name }}
 
This is a reminder for your task {{ $task->title }}
 
@component('mail::button', ['url' => route('task.edit',['task'=>$task->id])])
View Task
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent