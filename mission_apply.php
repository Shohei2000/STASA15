<?php session_start()?>
<?php require 'common/header1.php';?>

<link rel="stylesheet" href="css/mission_apply.css">

<?php
    $_SESSION['m_id'] = $_REQUEST['mission_id']; // URLパラメータからミッションIDを取得

    $sql = $pdo->prepare('select * from Mission where Mission_ID = ?');
    $sql->execute([$_SESSION['m_id']]);
    $_SESSION['mission'] = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="inner">
  <div class="container">
   <div class="detail"> 
    <h2 class="mission">ミッション内容</h2>
    <div class="description">
        <p class="m-0 p-4 text-center"><?php echo $_SESSION['mission'][0]['Mis_Detail']; ?></p>
    </div>
   </div> 
   <hr>
   <form action="mission_apply2.php">
    <div class="row"> 
     <div class="col"> 
     <label>メールアドレス</label>
     </div>
    </div>
    <div class="row mb-2">
      <div class="col">
      <input type="email" class="form-control" placeholder="yamadatarou.co.jp">
      </div>
    </div>  

    <div class="row"> 
     <div class="col"> 
     <label>電話番号</label>
     </div>
    </div>
    <div class="row mb-2">
      <div class="col">
      <input type="tel" class="form-control" placeholder="012-3456-7890">
      </div>
    </div>   
    
    <div class="row"> 
     <div class="col"> 
     <label>氏名</label>
     </div>
    </div>
    <div class="row mb-2">
      <div class="col-6">
      <input type="text" class="form-control" placeholder="剛田">
      </div>
      <div class="col-6">
      <input type="text" class="form-control" placeholder="剛志">
      </div>
    </div>  

    <div class="row mb-2">
      <div class="col">
       <input type="radio"><label>男性</label>
       <input type="radio" class="ml-2"><label>女性</label>
       <input type="radio" class="ml-2"><label>その他</label>
      </div>
    </div>  

    <div class="row"> 
     <div class="col"> 
     <label>生年月日</label>
     </div>
    </div>
    <div class="row mb-2">
      <div class="col-3">
      <input type="text" class="form-control" placeholder="XXXX">
      </div>
      <div class="col-1 col-form-label pl-0">
      <label>年</label>
      </div>
      <div class="col-3">
      <input type="text" class="form-control" placeholder="XXXX">
      </div>
      <div class="col-1 col-form-label pl-0">
      <label>月</label>
      </div>
      <div class="col-3">
      <input type="text" class="form-control" placeholder="XXXX">
      </div>
      <div class="col-1 col-form-label pl-0">
      <label>日</label>
      </div>
    </div>  

    <div class="row mb-2">
      <div class="col">
       <input type="checkbox" class="form-check-input">
        <label class="form-check-label" ><a href="">利用規約</a>に同意する</label>
      </div>  
    </div> 

    <div class="row mb-3">
      <div class="col">
       <input type="checkbox" class="form-check-input">
        <label class="form-check-label" ><a href="">プライバシーポリシー</a>に同意する</label>
      </div>  
    </div> 

    <div class="row mb-5">
      <div class="col" style="text-align:center;">
        <input type="button" onclick="location.href='top_menu.php'" class="btn-primary btn-lg px-5"value="戻る" style="color:white;border:none;border-radius:25px;">
          
       <input type="submit" class="btn-primary btn-lg px-5"value="申し込む" style="color:white;border:none;border-radius:25px;">
      </div>  
    </div> 

   </form>  
  </div>  
</div>

</body>

</html>