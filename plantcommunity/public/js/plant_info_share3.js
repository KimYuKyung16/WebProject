
const main_title = document.getElementById("main_title");
const write_button = document.getElementById("write_button");

// var login;

// function google_user_confirm() {
//   onAuthStateChanged(auth, (user) => { //현재 사용자가 누구인지 알 수 있음.
//     if (user) {
//       const uemail = user.email;
//       console.log("로그인이 되어 있는 상태");
//       console.log("로그인 된 구글 이메일:", uemail);
//       login = true; 
//     } else {
//       // User is signed out
//       // ...
//       console.log("로그인 아님");
//       //location.href='gallery_list.html'
//       login = false;
//     }
//   });
// }



// google_user_confirm();

write_button.addEventListener("click", function () {
  if (email) {
    location.href = 'plant_info_share_write.php';
  } else {
    alert("로그인 먼저 해주세요");
    location.href = 'login.html';
  }
  
});

main_title.addEventListener("click", function () { //메인 타이틀을 눌렀을 때
  location.href = 'index2.php';
});
