<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


//create dummy task 
class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description, //the ? makes teh property optional
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

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
      return view('show',['task'=> \App\Models\Task::findOrFail($id)]);
  })->name('tasks.show');
  //ROUTEで中身が単体だけを表示する場合’SHOW’のファイル名を使用するのが一般的


  // Request $request を使用する場合クラスをインポートする必要がある
  // Request $request を使用することで送られてきたデータをアクセスすることができる。
Route::post('/tasks',function(Request $request){
  dd($request->all());
})->name('tasks.store');








// Route::get('/hello',function() {
//     return'hello';
// })->name('hello');

// Route::get('/hallo',function(){
//     return redirect()->route('hello');
// });