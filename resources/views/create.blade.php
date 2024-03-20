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

    {{-- {{ $errors }} を記述することでフォームのエラーの内容が表示される　var_dump()のように。。　 --}}
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

            {{-- 
                value="{{ old('title') }}" :以前のリクエストで title フィールドに入力された値がある場合、その値を表示します。バリデーションエラーが発生した場合、この入力フィールドは以前の入力値を保持します。 --}}
            <input type="text" name="title" id="title" value="{{ old('title') }}">

            {{-- エラーの表示 --}}
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="desciption">description</label>
            <textarea name="description" id="description"  rows="5"> {{ old('description') }}
            </textarea>

            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_desciption" class="mb-4">description</label>
            <textarea name="long_description" id="long_description"  rows="10">
               {{ old('long_description') }}
            </textarea>

            @error('long_description')
             <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">Add Task</button>
        </div>


    </form>


@endsection