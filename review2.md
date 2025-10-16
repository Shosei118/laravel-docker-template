# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
<input type="hidden" name="_method" value="PUT">

### findメソッドの引数に指定しているIDは何のIDか
編集する対象のToDoレコードの主キー

### findメソッドで実行しているSQLは何か
SELECT * FROM todos WHERE id = ? LIMIT 1;
※ LIMIT 1：一致したレコードが複数あっても1件だけ取得する

### findメソッドで取得できる値は何か
Eloquentモデルのインスタンス。
該当するレコードがなければnullが返る。

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
モデルの$existsプロパティがtrueならUPDATE。
$existsがfalseならINSERT。


## Todo論理削除

### traitとclassの違いとは
class：1つのクラスに複数のトレイトを追加することができる
trait：クラスにプロパティやメソッドを追加するための機能。
     　複数のクラス間でコードを共通化・再利用することが可能。

### traitを使用するメリットとは
・コードの再利用性
・複数クラスに同じ処理を簡単に追加できる


## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
・ルートがコントローラを呼び出したとき
・Laravelがインスタンスを生成する際に自動で実行される。

### RequestクラスからFormRequestクラスに変更した理由
バリデーションクラスを作ってコントローラ内で直接バリデーションルールを書かなくても良くなる。

### $errorsのhasメソッドの引数・返り値は何か
・引数：確認したい入力欄のname属性（文字列）
・返り値：入力欄でバリデーションエラーが発生していればtrue、なければfalse

### $errorsのfirstメソッドの引数・返り値は何か
引数：確認したい入力欄のname属性
返り値：入力欄で発生した最初のエラーメッセージ（文字列）

### フレームワークとは何か
よく使う処理・設計を提供するツール
・容易に一定品質のプロダクトを作成することができる。
・枠組みが決定しているため初見のアプリケーションでもコードの記述場所などが特定しやすい。

### MVCはどういったアーキテクチャか
Model：DBとのやり取り
View：画面表示
Controller：ユーザからの入力に基づき、Model・Viewの制御

### ORMとは何か、またLaravelが使用しているORMは何か
ORM (Object-Relational Mapping)：
プログラミング言語のClassとデータベースのテーブルをマッピング（関連付け）することでSQLを直接操作せず
データベースとマッピングされたClassのメソッドを用いてDBとやり取りを行う。
Laravelが使用しているORM：Eloquent

### composer.json, composer.lockとは何か
composer.json：プロジェクトで使用するパッケージ・バージョンの宣言
composer.lock：実際にインストールされたパッケージのバージョン情報を固定

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
vendor/ディレクトリに格納される。