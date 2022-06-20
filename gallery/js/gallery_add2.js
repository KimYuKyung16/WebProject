const gallery_add_form = document.getElementById("gallery_add_form")
const gallery_name = document.getElementById("gallery_name")
const save_btn = document.getElementById("save_btn")
const date_confirm_btn = document.getElementById("date_confirm_btn")
const date_value = document.getElementById("date");


//date를 현재 날짜로 설정해놓기 위해서 필요한 변수들
var today = new Date();

var year = today.getFullYear();
var month = ('0' + (today.getMonth() + 1)).slice(-2);
var day = ('0' + today.getDate()).slice(-2);

var dateString = year + '-' + month  + '-' + day;


date_value.value = dateString;




save_btn.addEventListener("click", function(){ //저장 버튼을 눌렀을 때
  if (gallery_name.value != ""){
    gallery_add_form.submit();
  } else {
    alert("갤러리 이름을 입력해주세요.")
  }
  
  // location.href='gallery_add.php'
});
