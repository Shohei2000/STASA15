// ページの一部だけをreloadする方法
// Ajaxを使う方法
// XMLHttpRequestを使ってAjaxで更新
function ajaxUpdate(url, element) {

// urlを加工し、キャッシュされないurlにする。
//    url = url + '?ver=' + new Date().getTime();
    
//    document.getElementById("sound-file-sound_birdwhistle").play();//ガチャ演出音

    // ajaxオブジェクト生成
    var ajax = new XMLHttpRequest;

    // ajax通信open
    ajax.open('GET', url, true);

    // ajax返信時の処理
    ajax.onload = function () {

        // ajax返信から得たHTMLでDOM要素を更新
        element.innerHTML = ajax.responseText;
    };

    // ajax開始
    ajax.send(null);
    
    document.getElementById("sound-file-sound_birdwhistle").play();//ガチャ演出音

}

function gacha_buttonClick1(){
	var url = "./gacha_animation.php?point=100";
	var div = document.getElementById('main'); // main-containerの属性を引っ張ってくる
	ajaxUpdate(url, div);
}

function gacha_buttonClick2(){
	var url = "./gacha_animation.php?point=900";
	var div = document.getElementById('main'); // main-containerの属性を引っ張ってくる
	ajaxUpdate(url, div);
}



