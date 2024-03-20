@extends('layouts.app')

{{-- define a section,右は何を入力するか記述している --}}
@section('title', $task->title)


{{-- //define a section  --}}
@section('content')
<p>{{$task->description}}</p>

{{-- 全てlong_descriptionあるわけでもないためIF文を使う。あれば表示されるように --}}
@if($task->long_description)
    <p>{{$task->long_description}}</p>
@endif

<p>{{ $task->created_at}}</p>
<p>{{ $task->updated_at}}</p>


<div>
    <form action="{{ route('tasks.destroy',['task' => $task->id ])}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
    </form>
</div>
@endsection