<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    session_start();
    for($id = 1;$id <  4; $id++){
          try{
            include 'dbc.php';
          } catch (PDOException $e) {
            exit('データベース接続失敗。'.$e ->getMessage());
          }
          $stmt = $pdo -> prepare('SELECT * FROM kotaeshuu WHERE id=:id');
          $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
          $stmt -> execute();
          $odai[$id] = $stmt -> fetch();
    }
    if(isset($_POST['botan'])){
      if($_FILES['gazou']['size'] < 5 * 1024* 1024){
        if($_FILES['gazou']['type']=='image/jpeg'||'image/png'||'image/gif'){
          move_uploaded_file($_FILES['gazou']['tmp_name'],'./img/'.$_FILES['gazou']['name']);
          $odaiform=$_POST['odai'];
          $gazou=$_FILES['gazou']['name'];
          try{
            include 'dbc.php';
          } catch (PDOException $e) {
            exit('データベース接続失敗。'.$e ->getMessage());
          }
          $stmt = $pdo -> prepare("INSERT INTO kotae(odai, gazou) VALUES(:odai, :gazou)");//登録準備
          $stmt -> bindValue(':odai', $odaiform, PDO::PARAM_STR);//登録する文字の型を固定
          $stmt -> bindValue(':gazou', $gazou, PDO::PARAM_STR);
          $stmt -> execute();//データベースの登録を実行
          $pdo = NULL;//データベースの接続を解除
          header('Location: index.php');
        }else{echo'拡張子がgif、jpg、png以外の画像です';}
      }else{echo '5MB以上の画像です';}
    }
      include 'header.php';
?>
        <DIV align="center">
        <h2>写真投稿ページ</h2>
        </DIV>
        <div class=upload-hint>
          <img src="img/hint.jpg" class="idea-img">
          <p class="upload-catch">今日のお題はこちらです。<br>
          お題から連想した画像を投稿しましょう！</p>
        </div>
        <?php for($i=1;$i<=3;$i++){ ?>
        <div class= "upload-wrapper">
          <p class="upload-wrapper__odaiform">
            今日のお題 <?php echo $i ?>
          </p>
          <p class="upload-wrapper__odai">
            <?php
              echo $odai["$i"]["odai"];
            ?>
          </p>
          <p class="upload-wrapper__up">
          <form class="upload-wrapper__form" action='' method='post' enctype='multipart/form-data'>
              <input type ="file" name = "gazou">
              <input type ="hidden" name = "odai" value = "<?php echo $odai["$i"]["odai"];?>"><!-- type="hidden"でユーザーに見られる事なく、$_POSTで送信できる -->
              <input class="submit_button" type="submit" name="botan" value="写真アップロード">
          </form>
        </p>
        </div>
        <?php } ?>
    </body>
</html>
