<?php
    error_reporting(E_ALL);
    if(isset($_POST['datapost'])){
        //↑で送信ボタンが押された場合を示す
        try{
            include 'dbc.php';
        } catch (PDOException $e) {
            exit('データベース接続失敗。'.$e ->getMessage());
        }
        $stmt = $pdo -> prepare("INSERT INTO user(namae, mail, password) VALUES(:namae, :mail, :password)");//登録準備
        $stmt -> bindValue(':namae', $_POST['name'], PDO::PARAM_STR);//登録する文字の型を固定
        $stmt -> bindValue(':mail', $_POST['email'], PDO::PARAM_STR);
        $stmt -> bindValue(':password', $_POST['password'], PDO::PARAM_STR);
        $stmt -> execute();//データベースの登録を実行
        $pdo = NULL;//データベースの接続を解除
        //#TODO 登録完了画面に移動
    }
        include 'header.php';
?>
        <DIV align="center">

        <h2>新規会員登録画面</h2>

        <p>名前とメールアドレスとパスワードを入力してください</p>
        <form action="" method="post">
            <p>名前</p>
            <input type="text" name = "name">
            <p>メールアドレス</p>
            <input type ="text" name = "email">
            <p>パスワード</p>
            <input type ="password" name = "password">
            <p></p>
            <input class="submit_button" type="submit" name="datapost" value="新規会員登録">
        </form>
    </body>
</html>
