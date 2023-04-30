// This is a JavaScript file

var nowVal; //value値を保持する変数
function radioCheck(obj){
  if(nowVal == obj.value){
    obj.checked = false;
    nowVal = "";
    document.getElementById("sound-file-sample").pause();
  }else{
    nowVal = obj.value;
    document.getElementById("sound-file-sample").play();
  }
}



let el = document.getElementById("bgm");

function enableMute() {
  el.muted = true;
}

function disableMute() {
  el.muted = false;
}

$(function(){
  $('#Audio-Control button').click(function(){
    $('#Audio-Control button').toggleClass('active');
  });
});