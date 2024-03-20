@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
<div>
    
    <a href="{{route('tasks.create')}}">Add Task</a>
</div>
    {{-- display all the list of task  --}}
    @forelse ($tasks as $task)  
        <div>
            {{-- if you named routes,you only need to use route function,you specify the route name  --}}
            <a href="{{ route('tasks.show' ,['task' => $task->id]) }}" >{{$task->title}}</a>
        </div>    
    @empty
        <div>There are no tasks!</div>
    @endforelse

{{-- コレクションの要素数を確認し、その数が 0 より大きい場合にのみページネーションリンクを表示します。 --}}
    @if ($task->count())
    <nav>
        {{ $tasks->links() }}      
    </nav>  
    @else
        
    @endif
@endsection
