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

<p>
    @if($task->completed)
    Completed
    @else
    Not completed
    @endif
</p>


<div>
    <a href="{{ route('tasks.edit',['task' => $task->id])}}">Edit</a>
</div>


<div>
    <form method="POST" action="{{ route('tasks.toggle-complete',['task' => $task])}}">
    @csrf
    {{-- //サーバーにデータを修正したり、追加したりする場合はPUTを使用した方がいい,
        GETはデータを検索するときに使う。 --}}
    @method('PUT')
    <button>
        Mark as {{ $task->completed ? 'not completed' : 'completed' }}
    </button>
    
    </form>

</div>
<div>
    <form action="{{ route('tasks.destroy',['task' => $task->id ])}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
    </form>
</div>
@endsection