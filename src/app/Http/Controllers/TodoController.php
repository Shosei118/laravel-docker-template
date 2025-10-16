<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
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


    public function store(TodoRequest $request)
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


    public function update(TodoRequest $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
    {
        // リクエストされた値を取得
        $inputs = $request->all();
        // 更新対象のデータを取得
        $todo = Todo::find($id);
        // 更新したい値の代入とDB更新
        $todo->fill($inputs)->save();

        return redirect()->route('todo.show', $todo->id);
    }


    // TODO: ルートパラメータを引数に受け取る
    public function delete($id)
    {
        // TODO: 削除対象のレコードの情報を持つTodoモデルのインスタンスを取得
        $todo = Todo::find($id);
        $todo->delete();
        // TODO: ToDo一覧画面にリダイレクト
        return redirect()->route('todo.index');
    }
}
