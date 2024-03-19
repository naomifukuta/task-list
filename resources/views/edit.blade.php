@extends('layouts.app')

@section('title','Edit Task')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }

</style>
@endsection

@section('content')


    {{-- {{ $errors }} を記述することでフォームのエラーの内容が表示される　var_dump()のように。。　--}}
    {{-- フォームには必ずVALIDATIONをセットした方が良い --}}
    <form action="{{ route('tasks.update',['id' => $task->id]) }}" method="post">
        {{-- csrfはユーザーをCSRF（cross-site request forgery）攻撃から守る
             CSRFは必ず全てのフォームに記述した方が良い。--}}
        @csrf
            {{-- 更新をするときにはPUTメソッドを使用するが、HTMLのFORMにはPOSTとGETしか使用できないため、laravelでは↓のようにリクエストのメソッドをオーバーライドします。 --}}
        @method('PUT')

        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value=" {{$task->title}}">
            {{-- エラーの表示 --}}
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="desciption">desciption</label>
            <textarea name="description" id="description"  rows="5">
                {{ $task->description }}
            </textarea>

            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_desciption">long desciption</label>
            <textarea name="long_description" id="long_description"  rows="10">
                {{ $task->long_description }}

            </textarea>

            @error('long_description')
             <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Edit Task</button>
        </div>


    </form>


@endsection