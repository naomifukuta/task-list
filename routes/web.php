<?php

use Illuminate\Support\Facades\Route;


//create dummy task 
class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
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


//passing an array to the route.
Route::get('/', function () use($tasks){
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');
//you should have some common prefix of a route name if the route is revolving 
//around certain resource.
//in the case above,that is a task and the route that displays a list of elements should list of elements should be called "index".



Route::get('/{id}',function($id){
    return 'One single task';
})->name('tasks.show');
//the route that display one single element should be called "SHOW" suffix.

















// Route::get('/hello',function() {
//     return'hello';
// })->name('hello');

// Route::get('/hallo',function(){
//     return redirect()->route('hello');
// });