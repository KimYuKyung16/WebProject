const gallery_start = document.getElementById("gallery_start");
const scroll1 = document.getElementById("scroll1");




// const scroll1 = document.getElementsByClassName("scroll1");
const scroll2 = document.getElementsByClassName("scroll2");
const scroll3 = document.getElementsByClassName("scroll3");
const scroll4 = document.getElementsByClassName("scroll4");

const start_btn = document.getElementById("start_btn");
const review_btn = document.getElementById("review_go_btn");



// $(".slidelist").on('mousewheel', function(e){
//     var wheel = e.originalEvent.wheelDelta;

//     if(wheel>0){ 
//         //스크롤 올릴때 
       
        
//         $('.slidelist').css("transform", "translateX(" + (-100) + "vw )" );
        

           
    
//       } else { 
//         //스크롤  내릴때 
//         $('.slidelist').css("transform", "translateX(" + (100) + "vw)", "transition-duration:"+2+"s");

//       }

// });

var mHtml = $("html");
var page = 0;

mHtml.animate({scrollLeft : 0} ,1000);

$(window).on("wheel", function(e) {
  if(page == 0) return;
  if(mHtml.is(":animated")) return;
  if(e.originalEvent.deltaY > 0) { //오른쪽으로 이동하는 스크롤
      if(page == 5) return;
      page++;
  } else if(e.originalEvent.deltaY < 0) { // 왼쪽으로 이동하는 스크롤
      if(page == 1) return;
      page--;
  }
  var posLeft =(page-1) * $(window).width();
  mHtml.animate({scrollLeft : posLeft}, 2000);
})



start_btn.addEventListener("click", function(){ //갤러리 시작 버튼을 눌렀을 때
  begin();
  // mHtml.css('transform', "translateX("+ -$(window).width() + "px)");
  page ++;
});

review_btn.addEventListener("click", function(){ //리뷰 버튼을 눌렀을 때
    window.location.reload();
});









//2초 뒤 페이지 이동
function location_time(){
  setTimeout(function(){  mHtml.css('transform', "translateX("+ -$(window).width() + "px)");}, 1000);
  // setTimeout(function(){  mHtml.css('transform', "translateX("+ -screen.width + "px)");}, 1000);
}




function begin(){
  // gallery_start.style.webkitAnimation = "fadeIn 2s forwards"
  // gallery_start.style.animation = "fadeIn 2s forwards"

  scroll1.style.webkitAnimation = "fadeOut 4s forwards"
  scroll1.style.animation = "fadeOut 4s forwards"

  
  location_time();
}

