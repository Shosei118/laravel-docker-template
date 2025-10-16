<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }
    

    public function index()
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
        // view関数の第一引数と第二引数
    }


    public function create()
    {
        return view('todo.create');
    }


    public function store(Request $request)
    {
        // クラス名と引数が一緒に書かれている場合、そのクラスをインスタンス化したものが引数に入る。(メソッドインジェクション)

        // storeメソッド引数いくつ？
        // storeメソッド引数データ型、どういうデータ入ってるか？
        $inputs = $request->all();
        // dd($inputs);
    
        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');
    }


    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }


    public function edit($id)
{
    // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
    $todo = Todo::find($id);
    // TODO: view()を使用して編集画面を表示
    return view('todo.edit', ['todo' => $todo]);
}
}
