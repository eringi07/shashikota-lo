<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', "On");
    include 'dbc.php';
    include 'functions.php';
    $stmt = $pdo->prepare("SELECT MAX(id) FROM kotae");
    $stmt->execute();
    $maxid = $stmt->fetch();
    $maxid = intval($maxid['MAX(id)']);
    if(isset($_POST['liked_button'])){
        $stmt = $pdo->prepare("INSERT INTO likes(liked_id) VALUES(:liked_id_number)");
        $stmt->bindValue(':liked_id_number', $_POST['liked_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
    for($id=$maxid;$id>=1;$id--){
        $stmt = $pdo->prepare('SELECT * FROM kotae WHERE id=:id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $odai[$id] = $stmt->fetch();
        $stmt = $pdo->prepare('SELECT COUNT(id) FROM likes WHERE liked_id=:id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $count_liked[$id] = $stmt->fetch();
    }
    $pdo = null;
    include 'header.php';
?>
        <div class="box2">
            <img src="img/idea-hint.jpg" class="hint-img">
        </div>
        <div class="box3">
            <DIV align="center">
                <h2 class="main_come">お題に合う写真を投稿しましょう!</h2>
            </DIV>
            <div class="navigation">
                <p >あなたのパソコンやスマホに眠っている、自慢の画像ありませんか？</p>
                <p >お題からイメージを想像し、連想した画像を投稿してみましょう。<br>
                    お題にぴったり合う画像が見つかるかどうかは、あなたの発想次第。</p>
            </div>
        </div>
        <div class="gallary-tag">
            <DIV align="center">
                <h3>メインギャラリー</h3>
            </DIV>
        </div>
        <div class="main_container">
            <?php for($i=$maxid;$i>=1;$i--){ ?>
            <div class="gallary-wrapper">
                <p class="gallary-wrapper__day"><?php esc($odai[$i]["hizuke"]);?></p>
                <img src="img/<?php esc($odai[$i]["gazou"]);?>" class="gallary-wrapper__image">
                <h4 class="gallary-wrapper__odai"><?php esc($odai[$i]["odai"]);?></h4>
                <p class="gallary-wrapper__likes">イイね数<?php $arg_array = $count_liked[$i][0];
                    esc($arg_array);?>
                </p>
                <form action="" method="post">
                    <input type="hidden" name="liked_id" value="<?php echo $i;?>">
                    <input class="submit_button" type="submit" name="liked_button" value="イイね">
                </form>
            </div>
            <?php } ?>
        </div>
    </body>
</html>
