# wordpress-theme-template
WordPressテーマ制作のためのリポジトリテンプレートです。
このテンプレートは、新しいテーマの開発を迅速化するための基本的なファイルと設定を含んでいます。
柔軟性と拡張性を重視し、カスタマイズやデザインの変更が容易に行える構造を提供します。
テーマ開発のテンプレートとして使用してください。

## ローカル環境構築

### Dockerについて
開発環境としてDockerを使用しています。
docker-compose.ymlにオプションを設定する事ができます。
- [クィックスタート: Compose と WordPress](https://docs.docker.jp/compose/wordpress.html)
- [オフィシャルイメージ](https://hub.docker.com/_/wordpress)

### ディレクトリ名の変更
`/wp-content/themes/my-theme`ディレクトリ名を変更してください。
変更後に.envファイル内の`THEME_DIR=`の値にディレクトリ名を設定します。

### .envファイルの編集
先程のディレクトリ名を`THEME_DIR=`の値に設定してください。
下記の例ではcss, jsをビルドした際に`/wp-content/themes/my-theme`にビルドされます。
```
PORTS=8000:80
THEME_DIR=my-theme
```

### dockerコンテナ生成と起動

[docker](https://www.docker.com/get-started) インストール後に下記コマンド入力します。

```
docker-compose up -d --build
```

### 動作確認

- http://localhost:8000/
- http://localhost:8000/wp-admin/

```
id: admin
pw: password
mail: test@example.com
```

### docker停止

通常は`docker-compose down`で終了しますが、`--volumes`オプションを付けるとDBを削除できます。

```
docker-compose down --volumes
```


### ローカル環境のDBバックアップ

コンテナ起動中に下記コマンドで`db/mysql.dump.sql`にバックアップできます。  
バックアップしたDBはDB未設定でのコンテナ起動時に自動でリストアされます。  
(コンテナのDBを削除していない場合はリストアされません)

```
docker exec -it {DBのコンテナ名} sh -c 'mysqldump wordpress -u wordpress -pwordpress 2> /dev/null' > db/mysql.dump.sql
```

wordpress管理画面で画像をアップロードした場合はダンプしたsqlファイルと併せてuploadディレクトリ内の画像コミットしてください。
画像がコミットされていないsqlをインポートした場合はリンク切れします。

### 起動中のMySQLにアクセス

下記コマンドで起動中のコンテナにアクセスできます。
```
docker exec -it {DBのコンテナ名} bash
mysql -u wordpress -p
```

### webpack
もしまだNode.jsがインストールされていない場合は、まずインストールしてください。

- [Node.js](https://nodejs.org/ja)

Node.jsがインストールされたら、以下の手順で続けてください。

```
npm install
```

## テーマ制作
`themes/my-theme`内を編集してください。
css, jsはwebpackを使用できます。

### スタイルシート（StyleSheets）
SCSSをビルドする際は、以下のコマンドを実行してください。

```
npm run scss
```

### JavaScript
JavaScriptをビルドする際は、以下のコマンドを実行してください。
```
npm run build
```

### スタイル/スクリプトファイルの読み込みについて
ビルドしたファイルをテーマで使用する場合は`wp_enqueue_script()`, `wp_enqueue_style()`を使用して取り込んでください。

## トラブルシューティング

### docker起動時のエラー

```
ERROR: for コンテナ名 Cannot start service wordpress: driver failed programming external connectivity on endpoint コンテナ名 (): Bind for 0.0.0.0:8000 failed: port is already allocated
```

```
ERROR: Encountered errors while bringing up the project.
```

他のプログラムとポートが重複している。
他のdockerコンテナやサーバープログラムが動いていないか確認してください。
.envファイルのポート番号を変更してください。
