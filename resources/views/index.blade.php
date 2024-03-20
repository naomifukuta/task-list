@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
<nav class ="mb-4">
    
    <a href="{{route('tasks.create')}}" class="font-medium text-gray-700 underline decoration-pink-500">Add Task</a>
</nav>
    {{-- display all the list of task  --}}
    @forelse ($tasks as $task)  
        <div>
            {{-- if you named routes,you only need to use route function,you specify the route name  --}}
            <a href="{{ route('tasks.show' ,['task' => $task->id]) }}"
                @class(['font-bold','line-through' => $task->completed]) >{{$task->title}}
            </a>
        </div>    
    @empty
        <div>There are no tasks!</div>
    @endforelse

{{-- コレクションの要素数を確認し、その数が 0 より大きい場合にのみページネーションリンクを表示します。 --}}
    @if ($task->count())
    <nav class="mb-4">
        {{ $tasks->links() }}      
    </nav>  
    @else
        
    @endif
@endsection
