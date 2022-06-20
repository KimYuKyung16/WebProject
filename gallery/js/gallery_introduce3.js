const introduce_list1 = document.getElementById("introduce_list1")
const introduce_list2 = document.getElementById("introduce_list2")
const introduce_list3 = document.getElementById("introduce_list3")
const introduce_list4 = document.getElementById("introduce_list4")

window.addEventListener('scroll', () => { 
  //스크롤을 할 때마다 로그로 현재 스크롤의 위치가 찍혀나온다.
  console.log(window.scrollX, window.scrollY);
  if (window.scrollY >= 140) {
    introduce_list1.style="display:inline"
    introduce_list1.style.animation = "fadeOut 3s forwards"
  } 
  if (window.scrollY >= 660) {
    introduce_list2.style="display:inline"
    introduce_list2.style.animation = "fadeOut 3s forwards"
  } 
  if (window.scrollY >= 1190) {
    introduce_list3.style="display:inline"
    introduce_list3.style.animation = "fadeOut 3s forwards"
  }
  if (window.scrollY >= 1546) {
    introduce_list4.style="display:inline"
    introduce_list4.style.animation = "fadeOut 3s forwards"
  }
});

