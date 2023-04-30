<?php
    $sql = $pdo->prepare('select * from Mission where Mis_Difficulty = ?');

    //デイリーミッション情報取得
    $sql->execute(['0']);
    $_SESSION['mission_d'] = $sql->fetchAll(PDO::FETCH_ASSOC);
    //スペシャルミッション情報取得
    $sql->execute(['1']);
    $_SESSION['mission_s'] = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $count_mission_d = count($_SESSION['mission_d']);
    $count_mission_s = count($_SESSION['mission_s']);

    //-------------------------------------------------
    date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

    // DBに登録済みのデイリーミッション取得(本日クリア済み情報取得)
    $_SESSION['mission_clear_d'] = array(); // 配列の初期化
    $mission_clear_count = 0;

    $sql = $pdo->prepare("SELECT History.Mission_ID, History.User_ID, History.Mission_Date, Mission.Mis_Difficulty FROM Mission_History as History INNER JOIN Mission ON History.Mission_ID = Mission.Mission_ID WHERE User_ID = ? AND History.Mission_Date = ? AND  Mission.Mis_Difficulty = '0' ORDER BY History.Mission_ID ASC");
    $sql->execute([$_SESSION['user']['user_id'],date('Y-m-d')]);

    foreach ($sql as $row) {
        $_SESSION['mission_clear_d'][$mission_clear_count] = $row['Mission_ID'];
        $mission_clear_count++;
    }

    // DBに登録済みのスペシャルミッション取得(本日クリア済み情報取得)
    $_SESSION['mission_clear_s'] = array(); // 配列の初期化
    $mission_clear_count = 0;

    $sql = $pdo->prepare("SELECT History.Mission_ID, History.User_ID, History.Mission_Date, Mission.Mis_Difficulty FROM Mission_History as History INNER JOIN Mission ON History.Mission_ID = Mission.Mission_ID WHERE User_ID = ? AND History.Mission_Date = ? AND  Mission.Mis_Difficulty = '1' ORDER BY History.Mission_ID ASC");
    $sql->execute([$_SESSION['user']['user_id'],date('Y-m-d')]);

    foreach ($sql as $row) {
        $_SESSION['mission_clear_s'][$mission_clear_count] = $row['Mission_ID'];
        $mission_clear_count++;
    }

//    var_dump($_SESSION['mission_clear_d']);
//    var_dump($_SESSION['mission_clear_s']);
//    var_dump($_SESSION['mission_d']);
//    var_dump($_SESSION['mission_s']);
?>

<link rel="stylesheet" href="css/mission.css">

<div class="modal fade" id="modal1" tabindex="-1" role="dialog"
		aria-labelledby="label1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content pt-4 pl-4 pr-4" style="background: #efffef; border-radius:25px; text-align:center;">

				<div class="container mission_top" id="mission_top">

					<div class="row">
						<div class="col-12" style="text-align: center;">

							<div class="row">
								<div class="col-6"
									style="border-radius: 25px 25px 0 0; background: #9effce;">
									<h6 class="modal-title" id="title-tab" style="padding: 10% 0; color:#009933;"><a id="dailyBtn" onclick="clickDailyBtn1();">デイリー</a></h6>
								</div>
								<div class="col-6"
									style="border-radius: 25px 25px 0 0; background: #9eff9e;">
									<h6 class="modal-title" id="title-tab" style="padding: 10% 0; color:#009933;"><a id="specialBtn" onclick="clickSpecialBtn1();">スペシャル</a></h6>
								</div>
							</div>
						</div>
					</div>

					<div class="row bg-light" style="height:21rem; overflow-y: scroll;">
						<div class="col-12" id="d_mission">
                            
                            <!-- デイリーミッションループ開始 -->
                            <?php
                                for($i = 0; $i < $count_mission_d; $i++){
                                    
                                    $clear_display = 'none'; // 達成済み画像(熱盛)表示用(非表示)
                                    $clear_opacity = '1';
                                    $clear_disabled = '';
                                    
                                    for($j = 0; $j < count($_SESSION['mission_clear_d']); $j++){
                                        
                                        if(($i+1) == $_SESSION['mission_clear_d'][$j]){
                                            $clear_display = 'block'; // 達成済み画像(熱盛)表示用(表示)
                                            $clear_opacity = '0.21';
                                            $clear_disabled = 'disabled';
                                        }
                                        
                                    }// クリア済み判定for文
                            ?>
                            
							<div class="row d_mission m-2 rounded" id="mission" style="background:#e0ffe0; display:flex; position: relative;">
								<div class="col-8 text-center mission-noclear_d<?php echo $_SESSION['mission_d'][$i]['Mission_ID']; ?>" style="opacity:<?php echo $clear_opacity; ?>">
									<div class="row h-100" style="align-content: center;">
										<div class="col-12" style="display: flex; justify-content: center; align-items: center;">
                                            <p class="m-0"><?php echo $_SESSION['mission_d'][$i]['Mis_Name']; ?></p>
										</div>
										<div class="col-12 progress" style="display: flex; justify-content: center; align-items: center; background-color: transparent;">
											<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 80%; height:25%;"></div>
										</div>
									</div>
								</div>
								<div class="col-4 text-center mission-noclear_d<?php echo $_SESSION['mission_d'][$i]['Mission_ID']; ?>" style="opacity:<?php echo $clear_opacity; ?>">
									<div class="row">
										<div class="col-12 p-1">
											<button type="button"
												class="btn-outline-info detail_button_d<?php echo $_SESSION['mission_d'][$i]['Mission_ID']; ?>" onclick="clickDetailBtn1('<?php echo $_SESSION['mission_d'][$i]['Mis_Name']; ?>','<?php echo $_SESSION['mission_d'][$i]['Mis_Detail']; ?>')" <?php echo $clear_disabled; ?> >詳細</button>
										</div>
										<div class="col-12 p-1">
											<button type="button"
												class="btn-outline-info receive_button_d<?php echo $_SESSION['mission_d'][$i]['Mission_ID']; ?>" onclick="clickReceiveBtn1('<?php echo $_SESSION['mission_d'][$i]['Mission_ID'];?>')" <?php echo $clear_disabled; ?> >受取</button>
										</div>
									</div>
								</div>
				                <div id="mission-clear_d<?php echo $_SESSION['mission_d'][$i]['Mission_ID']; ?>" style="display:<?php echo $clear_display; ?>;">
				                    <img class="receive_pic" src="./img/Atumori.png" alt="recived_pic" style="width: 40%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
								</div>
							</div><!-- row d_mission m-2 rounded -->
                            
                            
                            <?php
                                }
                                if(count($_SESSION['mission_d']) == 0){
                                    ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="p-2">デイリーミッションはありません。</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                            
						</div><!-- col-12 id="d_mission" -->

            <!-- デイリーミッション/ミッション -->

						<div class="col-12" id="s_mission" style="display:none;">
                            
                            <!-- スペシャルミッションループ開始 -->
                            <?php
                                for($i = 0; $i < count($_SESSION['mission_s']); $i++){
                                    
                                    $clear_display = 'none'; // 達成済み画像(熱盛)表示用(非表示)
                                    $clear_opacity = '1';
                                    $clear_disabled = '';
                                    
                                    for($j = 0; $j < count($_SESSION['mission_clear_s']); $j++){
                                        
                                        if($_SESSION['mission_s'][$i]['Mission_ID'] == $_SESSION['mission_clear_s'][$j]){
                                            $clear_display = 'block'; // 達成済み画像(熱盛)表示用(表示)
                                            $clear_opacity = '0.2';
                                            $clear_disabled = 'disabled';
                                        }
                                        
                                    }// クリア済み判定for文
                            ?>
                            
							<div class="row s_mission m-2 rounded" id="mission" style="background:#e0ffe0; display:flex; position: relative;">
								<div class="col-8 text-center mission-noclear_s<?php echo $_SESSION['mission_s'][$i]['Mission_ID']; ?>" style="opacity:<?php echo $clear_opacity; ?>">
									<div class="row h-100" style="align-content: center;">
										<div class="col-12" style="display: flex; justify-content: center; align-items: center;">
											<p class="m-0"><?php echo $_SESSION['mission_s'][$i]['Mis_Name']; ?></p>
										</div>
										<div class="col-12 progress" style="display: flex; justify-content: center; align-items: center; background-color: transparent;">
											<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 80%; height:25%;"></div>
										</div>
									</div>
                                    
								</div>
								<div class="col-4 text-center mission-noclear_s<?php echo $_SESSION['mission_s'][$i]['Mission_ID']; ?>" style="opacity:<?php echo $clear_opacity; ?>">
									<div class="row">
										<div class="col-12 p-1">
											<button type="button"
												class="btn-outline-info detail_button_s<?php echo $_SESSION['mission_s'][$i]['Mission_ID']; ?>" onclick="clickDetailBtn1('<?php echo $_SESSION['mission_s'][$i]['Mis_Name']; ?>','<?php echo $_SESSION['mission_s'][$i]['Mis_Detail']; ?>')" <?php echo $clear_disabled; ?> >詳細</button>
										</div>
										<div class="col-12 p-1">
											<button type="button"
												class="btn-outline-info receive_button_s<?php echo $_SESSION['mission_s'][$i]['Mission_ID']; ?>" onclick="clickReceiveBtn2('<?php echo $_SESSION['mission_s'][$i]['Mission_ID'];?>')" <?php echo $clear_disabled; ?> >応募</button>
										</div>
									</div>
								</div>
				                <div id="mission-clear_s<?php echo $_SESSION['mission_s'][$i]['Mission_ID']; ?>" style="display:<?php echo $clear_display; ?>;">
				                    <img class="receive_pic" src="./img/Atumori.png" alt="recived_pic" style="width: 40%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
								</div>

							</div><!-- row s_mission m-2 rounded -->
                            
                            <?php
                                }
                                if(count($_SESSION['mission_s']) == 0){
                                    ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="p-2">スペシャルミッションはありません。</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                            
						</div><!-- col-12 id~"s_mission" -->
            
                        <div id="mission-clear_s" style="display:none;">
                          <img class="receive_pic" src="./img/Atumori.png" alt="recived_pic" style="width: 40%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        </div>

					</div><!-- row bg-light -->

						<a href="" class="btn btn--green close" onclick="clickCloseBtn1()" data-dismiss="modal" aria-label="Close">閉じる</a>
				</div><!-- container -->

        <!-- -------------------地平線----------------------- -->

        <div class="container mission_detail" id="mission_detail" style="display:none;">
          <div class="row bg-light p-4">
          	<div class="col-12 h-100 w-100">

	          	<div class="row">
		          	<div class="col-12 quiz-title">
		          		<h1 class="m-0" id="mis_name"></h1>
		          	</div>
	          	</div>

	          	<div class="row">
		          	<div class="col-12 quiz-progress">
		          		<p class="p-0 m-0">0/5</p>
		          	</div>
	          	</div>

	          	<div class="row">
					<div class="col-12 progress" style="display: flex; justify-content: center; align-items: center; background-color: transparent;">
						<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 80%; height:25%;"></div>
					</div>
	          	</div>

	          	<div class="row">
		          	<div class="col-12 quiz-detail">
		            	<h2 class="m-0" id="mis_detail"></h2>
		            </div>
	          	</div>

	          	<div class="row">
		          	<div class="col-12 quiz-prize p-1">
		            	<p class="p-0 m-0">リワード</p>
		            </div>
	          	</div>

	          	<div class="row">
		          	<div class="col-12 quiz-prizeImg">
		            	<div class="img-container">
							<img class="point-picture" src="./img/point_coin.png" alt="point" style="width:50vw;">
		            	</div>
		            </div>
	          	</div>

          	</div>

           </div><!-- row bg-light -->

          <a class="btn btn--green close" onclick="clickBackBtn1()">戻る</a>
        </div> <!-- container mission_detail -->

			</div>
		</div>
	</div>

<script>
    
var d = document.getElementById("d_mission"); // 変数定義
var s = document.getElementById("s_mission"); // 変数定義

var m_top = document.getElementById("mission_top"); // 変数定義
var m_detail = document.getElementById("mission_detail"); // 変数定義
    
//デイリーミッション用変数初期化
var m_clear_d = new Array();
var m_noclear_d = new Array();
var d_button_d = new Array();
var r_button_d = new Array();
    
//スペシャルミッション用変数初期化
var m_clear_s = new Array();
var m_noclear_s = new Array();
var d_button_s = new Array();
var r_button_s = new Array();
    
//デイリーミッション用変数-作成
for (let i = 1; i <= '<?php echo $count_mission_d; ?>'; i++) {
   console.log("デイリーミッション" + (i+1) + "回目の処理です。");
    m_clear_d[i] = document.getElementById("mission-clear_d"+i); // 変数定義
    m_noclear_d[i] = document.getElementsByClassName("mission-noclear_d"+i); // 変数定義
    d_button_d[i] = document.getElementsByClassName("detail_button_d"+i);
    r_button_d[i] = document.getElementsByClassName("receive_button_d"+i); // 変数定義
 }

//スペシャルミッション用変数-作成
for (let i = <?php echo $_SESSION['mission_s'][0]['Mission_ID']; ?>; i <= '<?php echo $_SESSION['mission_s'][$count_mission_s-1]['Mission_ID']; ?>'; i++) {
   console.log("スペシャルミッション" + (i+1) + "回目の処理です。");
    m_clear_s[i] = document.getElementById("mission-clear_s"+i); // 変数定義
    m_noclear_s[i] = document.getElementsByClassName("mission-noclear_s"+i); // 変数定義
    d_button_s[i] = document.getElementsByClassName("detail_button_s"+i); // 変数定義
    r_button_s[i] = document.getElementsByClassName("receive_button_s"+i); // 変数定義
}

//不要？
//デイリーミッション用変数-display:none
//for (let i = 0; i < '<?php echo $count_mission_d; ?>'; i++) {
//   console.log("デイリーミッション" + (i+1) + "回目の処理です。");
//    m_clear_d[i].style.display = "none";
//}
    
//スペシャルミッション用変数-display:none
//for (let i = 0; i < '<?php echo $count_mission_s; ?>'; i++) {
//   console.log("スペシャルミッション" + (i+1) + "回目の処理です。");
//    m_clear_s[i].style.display = "none";
//}

d.style.display ="block"; // 初期設定
s.style.display ="none"; // 初期設定

m_top.style.display ="block"; // 初期設定
m_detail.style.display ="none"; // 初期設定
    
//---------------------------------------------

function clickDetailBtn1(mis_name,mis_detail){ // 詳細ボタン投下時

	m_top.style.display = "none";
	m_detail.style.display = "block";
    
    document.getElementById('mis_name').innerHTML = mis_name;
    document.getElementById('mis_detail').innerHTML = mis_detail;
        
    console.log(mis_name+""+mis_detail);
	console.log("しょうさい");
}
    
function clickReceiveBtn1(no){ // 受取ボタン投下時(デイリーミッション)
    
    console.log("clickReceiveBtn1のno:"+no)

    var data = no;
	m_noclear_d[no][0].style.opacity = 0.2;
	m_noclear_d[no][1].style.opacity = 0.2;
	d_button_d[no][0].disabled = true;
	r_button_d[no][0].disabled = true;
	m_clear_d[no].style.display = "block";
     
    // ajaxの処理で、request.phpでDBにINSERT
    $.ajax({
        type: "POST", //　GETでも可
        url: "request.php", //　送り先
        data: { 'データ': data }, //　渡したいデータをオブジェクトで渡す
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

	console.log("デイリー受取");
}
    
function clickReceiveBtn2(no){ // 受取ボタン投下時(スペシャルミッション)

    window.location.href = "mission_apply.php?mission_id="+no; // 通常の遷移

//    var data = no;
//	m_noclear_s[no][0].style.opacity = 0.2;
//	m_noclear_s[no][1].style.opacity = 0.2;
//	d_button_s[no][0].disabled = true;
//	r_button_s[no][0].disabled = true;
//	m_clear_s[no].style.display = "block";
    
	console.log("スペシャル応募");
}

function clickDailyBtn1(){ // デイリータブ投下時

	d.style.display = "block";
	s.style.display = "none";

	console.log("でいりー");
}

function clickSpecialBtn1(){ // スペシャルータブ投下時

	d.style.display = "none";
	s.style.display = "block";

	console.log("すぺしゃる");
}

function clickCloseBtn1(){ // 閉じるボタン投下時

	d.style.display = "block";
	s.style.display = "none";

	console.log("とじる");
}

function clickBackBtn1(){ // 戻るボタン投下時

	m_top.style.display = "block";
	m_detail.style.display = "none";

	console.log("戻る");
}

    
</script>

<style>
.btn--green,
a.btn--green {
  color: #009933;
  background-color: #9eff9e;
  margin: 1rem;
}
</style>