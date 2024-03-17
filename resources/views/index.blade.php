@extends('layouts.app')

{{-- define a section,右は何を入力するか記述している --}}
@section('title', 'The list of tasks')


@section
    {{-- //display all the list of task  --}}
   
    @forelse ($tasks as $task)  
        <div>
            {{-- if you named routes,you only need to use route function,you specify the route name  --}}
            <a href="{{ route('tasks.show' ,['id' => $task->id]) }}" >{{$task->title}}</a>
        </div>    
    @empty
        <div>There are no tasks!</div>
    @endforelse


@endsection