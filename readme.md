このプログラムは、LINE Bot SDKを使いません。
また、まだおすすめできるほどしっかり作られていません。

公式の方法よりは簡単にLINE Botを作成できるものです。

### 定数
* GREETING > その時間に合った挨拶 (例: こんばんは)
* DOW > 今日の曜日 (例: Mon)
* DOW_JP > 今日の曜日 (例: 月)
* NL > 改行(\n)
* DS > ディレクトリ区切り文字 (DIRECTORY_SEPARATOR)

### 定義
reply() > 返信します。
`reply(string $message, bool $exit = true)`
- (string)$message > メッセージ (書き方は公式ドキュメントをご確認下さい)
- (bool)$exit > 返信後、プログラムを終了させるかどうか (default: true)

```php
reply([
  'type' => 'text';
  'text' => 'テキスト'
]);
```

```php
// サンプルコード
require_once 'line.php';


```
