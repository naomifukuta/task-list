@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    {{-- display all the list of task  --}}
    @forelse ($tasks as $task)  
        <div>
            {{-- if you named routes,you only need to use route function,you specify the route name  --}}
            <a href="{{ route('tasks.show' ,['id' => $task->id]) }}" >{{$task->title}}</a>
        </div>    
    @empty
        <div>There are no tasks!</div>
    @endforelse
@endsection
