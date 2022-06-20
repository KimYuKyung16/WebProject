const thumbnail_list = document.getElementById("thumbnail_list");

const p_gallery_list_td1 = document.getElementById("p_gallery_list-td1");
const p_gallery_list_td2 = document.getElementById("p_gallery_list-td2");
const p_gallery_list_td3 = document.getElementById("p_gallery_list-td3");

const p_gallery_list_1 = document.getElementById("popular_gallery_list_1");
const p_gallery_list_2 = document.getElementById("popular_gallery_list_2");
const p_gallery_list_3 = document.getElementById("popular_gallery_list_3");

var p_gallery_list_td = [p_gallery_list_td1, p_gallery_list_td2, p_gallery_list_td3];
var p_gallery_list = [p_gallery_list_1, p_gallery_list_2, p_gallery_list_3];

//첫 번째 갤러리를 선택했을 때
p_gallery_list_td1.onmouseover = function() {
  mouse_over(0, p_gallery_list[0], p_gallery_list_td[0]);
}
p_gallery_list_td1.onmouseout = function() {
  mouse_out(p_gallery_list[0], p_gallery_list_td[0]);
}

//두 번째 갤러리를 선택했을 때
p_gallery_list_td2.onmouseover = function() {
  mouse_over(1, p_gallery_list[1], p_gallery_list_td[1]);
}
p_gallery_list_td2.onmouseout = function() {
  mouse_out(p_gallery_list[1], p_gallery_list_td[1]);
}

//세 번째 갤러리를 선택했을 때
p_gallery_list_td3.onmouseover = function() {
  mouse_over(2, p_gallery_list[2], p_gallery_list_td[2]);
}
p_gallery_list_td3.onmouseout = function() {
  mouse_out(p_gallery_list[2], p_gallery_list_td[2]);
}


function mouse_out(list, td_list){ //마우스를 뗐을 때
  list.style.color = "#848484";
  list.style.fontWeight = "normal"
  td_list.style.backgroundColor = "White"
}

function mouse_over(num, list, td_list){ //마우스를 올렸을 때
  thumbnail_list.style.transform = "translateX(" + (-800 * num) + "px)";
  list.style.color = "White";
  list.style.fontWeight = "Bold"
  td_list.style.backgroundColor = "rgb(129, 172, 252)"
}




// name0.onmouseover = function(){
//   $("#thumbnail_list").css('transform', "translateX("+ 0 + "px)");
// }

// name1.onmouseover = function(){
//   $("#test").css('transform', "translateX("+ (1 * -700) + "px)");
// }

// name2.onmouseover = function(){
//   $("#test").css('transform', "translateX("+ (2 * -700) + "px)");
// }
