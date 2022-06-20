const img1 = document.getElementById("img1");
const img2 = document.getElementById("img2");
const img3 = document.getElementById("img3");
const open_btn = document.getElementById("open_btn");
const main_div = document.getElementById("main-div");
const image_div = document.getElementById("image-div");

// const test = document.getElementById("test");

const logo = document.getElementsByClassName("logo");

var open_count = 0; 

open_btn.addEventListener("click", function(){ //열고 닫기 버튼을 눌렀을 때
  open_count ++;

  if (open_count % 2 == 1){ // 창 닫기
    main_div.style.animation = "disappear 2s forwards"
  } else { // 창 열기
    main_div.style.animation = "appear 2s forwards"
  }
});



img1.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(1);
});

img2.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(2);
});

img3.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(3);
});

img4.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(4);
});

img5.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(5);
});

img6.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(6);
});

img7.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(7);
});

img8.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(8);
});

img9.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(9);
});

img10.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(10);
});

img11.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(11);
});

img12.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  showPopup(12);
});




function logo_click() {
  location.href='main.php'
}

for (var i=0; i<logo.length; i++) {
  logo[i].addEventListener("click", logo_click);
}