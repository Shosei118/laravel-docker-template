<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // DB
    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];

    // なんでTodoクラスにはメソッドの定義が一行もないのに、Todoインスタンスからfillメソッドやallメソッドが呼べているのか？
    // extends（継承）しているため。
    // 
    // public function fill() {
    //     // ~~~
    // }
}
