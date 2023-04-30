<?php session_start()?>
<?php require 'common/header1.php';?>

<link rel="stylesheet" href="css/mission_apply.css">

<div class="inner">
  <div class="container">
      
      <div class="items" style="margin-top:70%;margin-bottom:70%;"> 
       <div class="detail mb-5" style="padding-bottom:10px;"> 
        <div class="description" style="font-size:20px;">
        申し込みが完了いたしました。
        その他の詳細はメールにて連絡いたします。
        </div>
       </div> 


        <div class="row mb-5">
          <div class="col" style="text-align:center;">
           <a href="top_menu.php" class="btn-primary btn-lg px-3" style="color:white;border:none;border-radius:25px;text-decoration:none;">
          TOPへ戻る
           </a>      
           </div> 
        </div>

        </div>
      
  </div>  
</div>

<script>
    // ajaxの処理で、request.phpでDBにINSERT
    $.ajax({
        type: "POST", //　GETでも可
        url: "request.php", //　送り先
        data: { 'データ': <?php echo $_SESSION['m_id']; ?> }, //　渡したいデータをオブジェクトで渡す
        dataType : "json", //　データ形式を指定
        scriptCharset: 'utf-8' //　文字コードを指定
    })
    .then(
        function(param){　 //　paramに処理後のデータが入って戻ってくる
            console.log(param); //　帰ってきたら実行する処理
        },
        function(XMLHttpRequest, textStatus, errorThrown){ //　エラーが起きた時はこちらが実行される
            console.log(XMLHttpRequest); //　エラー内容表示
    });
</script>

</body>

</html>