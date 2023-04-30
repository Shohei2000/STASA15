// This is a JavaScript file

 //value値を保持する変数
function click(flg){
  var openClasses = document.getElementsByClassName("open");
  var closeClasses = document.getElementsByClassName("clos");
  for(var i = 0;i < openClasses.length;i++){
    document.getElementsByClassName("open")[i].style.display="none";
  }  
  for(var i = 0;i < closeClasses.length;i++){
    document.getElementsByClassName("clos")[i].style.display="block";
  }
    
    var data = 'でーたー';
    
    //問題正解/不正解音処理
    if(flg == true){
        document.getElementById("sound-file-correct").play();//正解音
    }else{        
        document.getElementById("sound-file-wrong").play();//不正解音
    }
    
    // ajaxの処理で、request.phpでDBにINSERT
    $.ajax({
        type: "POST", //　GETでも可
        url: "./request_quiz.php", //　送り先
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

        
}

function closeModal3(){// 閉じるボタン用
    //ボタン音処理
    document.getElementById("sound-file-button_sound1").play();//正解音

    var quiz_text = document.getElementById("modal3");
    quiz_text.style.display = "none";
}