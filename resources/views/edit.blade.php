@extends('layouts.app')




@section('content')


    {{-- {{ $errors }} を記述することでフォームのエラーの内容が表示される　var_dump()のように。。　--}}
    {{-- フォームには必ずVALIDATIONをセットした方が良い --}}
    <form action="{{ route('tasks.update',['task' => $task->id]) }}" method="post">
        {{-- csrfはユーザーをCSRF（cross-site request forgery）攻撃から守る
             CSRFは必ず全てのフォームに記述した方が良い。--}}
        @csrf
            {{-- 更新をするときにはPUTメソッドを使用するが、HTMLのFORMにはPOSTとGETしか使用できないため、laravelでは↓のようにリクエストのメソッドをオーバーライドします。 --}}
        @method('PUT')

        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" 
            value=" {{$task->title}}">
            {{-- エラーの表示 --}}
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="desciption">desciption</label>
            <textarea name="description" id="description"  rows="5">
                {{ $task->description }}
            </textarea>

            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_desciption">long desciption</label>
            <textarea name="long_description" id="long_description"  rows="10">
                {{ $task->long_description }}

            </textarea>

            @error('long_description')
             <p class="error"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">Edit Task</button>
            <a href="{{route('tasks.index')}}" class="link">Cancel</a>
        </div>


    </form>


@endsection