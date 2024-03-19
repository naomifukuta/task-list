@extends('layouts.app')

@section('title','Add Task')


@section('content')

    {{-- {{ $errors }} を記述することでフォームのエラーの内容が表示される　var_dump()のように。。　--}}
    {{-- フォームには必ずVALIDATIONをセットした方が良い --}}
    <form action="{{ route('tasks.store') }}" method="post">
        {{-- 
            csrfはユーザーをCSRF（cross-site request forgery）攻撃から守る
            CSRFは必ず全てのフォームに記述した方が良い。
         --}}
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="desciption">desciption</label>
            <textarea name="description" id="description"  rows="5">
            </textarea>
        </div>

        <div>
            <label for="long_desciption">desciption</label>
            <textarea name="long_description" id="long_description"  rows="10">
            </textarea>
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>


    </form>


@endsection