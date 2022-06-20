const left_btn = document.getElementById("left_btn")
const right_btn = document.getElementById("right_btn")
const banner5 = document.getElementById("banner1")
const banner6 = document.getElementById("banner2")
const banner7 = document.getElementById("banner3")
const banner8 = document.getElementById("banner4")

var page = 1;
var banner1 = $("#banner1");
var banner2 = $("#banner2");
var banner3 = $("#banner3");
var banner4 = $("#banner4");


right_btn.addEventListener("click", function(){
  if (page==4) {
    
  } else {
    $("#banner1, #banner2, #banner3, #banner4").css('transform', "translateX("+ (page * -800) + "px)")
    page++;
  }
});

const test = ((page-1)*-800);

left_btn.addEventListener("click", function(){
  if (page==1) {
    
  } else {
    page--;
    $("#banner1, #banner2, #banner3, #banner4").css('transform', "translateX("+ ((page-1) * -800) + "px)")
    // $("#banner1, #banner2, #banner3, #banner4").animate({translateX : ((page-1)*-800)}, 2000);
    // banner6.animate([
    //   { transform: 'translateX('+test+'px)'}
    // ],{
    //   duration: 2000,
    //   terations: Infinity
    // });
  }

});
