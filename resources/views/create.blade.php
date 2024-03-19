@extends('layouts.app')

@section('title','Add Task')
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
            {{-- エラーの表示 --}}
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="desciption">desciption</label>
            <textarea name="description" id="description"  rows="5">
            </textarea>

            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_desciption">desciption</label>
            <textarea name="long_description" id="long_description"  rows="10">
            </textarea>

            @error('long_description')
             <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>


    </form>


@endsection