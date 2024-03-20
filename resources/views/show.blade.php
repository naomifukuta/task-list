@extends('layouts.app')

{{-- define a section,右は何を入力するか記述している --}}
@section('title', $task->title)


{{-- //define a section  --}}
@section('content')
<div class="mb-4">
    <a href="{{route('tasks.index')}}" class="link">⇦ Go back to the Task List</a>
</div>


<p class="mb-4 text-slate-700">{{$task->description}}</p>

{{-- 全てlong_descriptionあるわけでもないためIF文を使う。あれば表示されるように --}}
@if($task->long_description)
    <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
@endif

<p class="mb-4 text-sm text-slate-500"> Created:{{ $task->created_at->diffForHumans()}} ・  Updated :{{ $task->updated_at->diffForHumans()}}</p>


<p class="mb-4">
    @if($task->completed)
    <span class="font-medium text-green-500">Completed</span>
    @else
    <span class="font-medium text-red-500">Not completed</span>
    @endif
</p>


<div class="flex gap-2">
    <a href="{{ route('tasks.edit',['task' => $task->id])}}"
        class="btn">
        Edit
    </a>

    <form method="POST" action="{{ route('tasks.toggle-complete',['task' => $task])}}">
    @csrf
    {{-- //サーバーにデータを修正したり、追加したりする場合はPUTを使用した方がいい,
        GETはデータを検索するときに使う。 --}}
    @method('PUT')
    <button class="btn">
        Mark as {{ $task->completed ? 'not completed' : 'completed' }}
    </button>
    
    </form>


    <form action="{{ route('tasks.destroy',['task' => $task->id ])}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn">Delete</button>
    </form>
</div>
@endsection