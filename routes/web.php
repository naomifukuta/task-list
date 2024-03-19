<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


//create dummy task 

//自動的に tasks.index にリダイレクトする
Route::get('/',function(){
    return redirect()->route('tasks.index');
});



//passing an array to the route.
Route::get('/tasks', function (){
    return view('index', [
      // all()：全てのタスクを取得
        // 'tasks' => \App\Models\Task::all()

      // 最新のタスクを順序で表示
        'tasks' => \App\Models\Task::latest()->get()

      //達成しているタスクのみ表示 ：DBでCOMPLETED列がTRUEの場合
      // 'tasks' => \App\Models\Task::latest()->where('completed',true)->get()
    ]);
    //nameをつけることで中身を変えてもそのまま使用することができるので便利。
})->name('tasks.index');
//you should have some common prefix of a route name if the route is revolving 
//around certain resource.
//複数の要素があるページの場合、INDEXをファイル名にすることが一般的。



//タスクを追加するするフォームの表示　
//もし追加のデータの取得する必要がない場合がGETメソッドを使わず、ROUTEにVIEWを使用すれば良い
// 第一引数はURLを渡して
// 第二引数はVIEWのファイル名を渡す
Route::view('/tasks/create','create')
  ->name('tasks.create'); 




//リンクの後にパラメータを使用する場合は順番的に先に読み込まれて他のROUTEがエラーになるため、最後に記述する必要がる。
Route::get('/tasks/{id}',function($id) {
  //find() lets you fetch a record from database, one single row but its primary key.
  
  // findOrFail($id) :
  // 指定された主キーに対応するレコードをデータベースから取得します。レコードが見つからない場合は、ModelNotFoundException　404エラー がスローされます。
      return view('show',['task'=> Task::findOrFail($id)]);
      //ROUTEで中身が単体だけを表示する場合’SHOW’のファイル名を使用するのが一般的
  })->name('tasks.show');
  



  // Request $request を使用する場合クラスをインポートする必要がある
  // Request $request を使用することで送られてきたデータをアクセスすることができる。
Route::post('/tasks',function(Request $request){
  //データの検証
  $data = $request->validate([
    // 'フォーム内のname' => '検証のルール'
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required',
    //検証に問題がなければ$dataに配列としてデータが格納される。
    // もし不正があれば、laravelは強制的に前のページに戻ってエラーを表示する
  ]);


  // 新しいタスクを作成
  //クラスをインポートされていればクラス名だけで記述可能。
  //$task = new App\Models\Task; を下のように記述可能

  // モデルのTaskクラスをインスタンス化
  $task = new Task;
  // タスクのプロパティをセット
  // $data['title']をモデルのTaskクラスにtitleって名前で格納。
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];

  // save() メソッドは、Eloquent モデルの新しいレコードをデータベースに保存する場合や、既存のレコードの変更を保存する場合に使用されます。
  $task->save();
  //tasks.show という名前のルートにリダイレクトしている
  return redirect()->route('tasks.show',['id' => $task->id]);
})->name('tasks.store');








// Route::get('/hello',function() {
//     return'hello';
// })->name('hello');

// Route::get('/hallo',function(){
//     return redirect()->route('hello');
// });