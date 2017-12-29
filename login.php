<?php
    session_start();
    error_reporting(E_ALL);
    if(isset($_POST['datapost'])){
        //↑で送信ボタンが押された場合を示す
        try{
          include 'dbc.php';
        } catch (PDOException $e) {
          exit('データベース接続失敗。'.$e ->getMessage());
        }
        $stmt = $pdo -> prepare('SELECT * FROM user WHERE mail=:mail');//特殊な文を無効　エスケープ
        $stmt -> bindValue(':mail', $_POST['email'], PDO::PARAM_STR);//文字の型を指定
        $stmt -> execute();
        $data = $stmt -> fetch();
        echo $data['namae'];
        if($data['password'] == $_POST['password']){
          setcookie('cookie', $data['mail'], time()+(60*60*24*3), '/' );
          $_SESSION = $data ;
          header('Location: index.php');
        }
    }
        include 'header.php';
?>
        <DIV align="center">
        <h2>ログインページ</h2>
        <p>メールアドレスとパスワードを入力してください</p>
        <form action="" method="post">
            <p>メールアドレス</p>
            <input type ="text" name = "email">
            <p>パスワード</p>
            <input type ="password" name = "password">
            <p></p>
            <input class="submit_button" type="submit" name="datapost" value="ログイン">
        </form>
    </body>
</html>
