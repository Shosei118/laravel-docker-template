<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
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
