const title = document.getElementById("title");
const signup_btn = document.getElementById("signup_btn");
const login_btn = document.getElementById("login_btn");
const my_info_btn = document.getElementById("my_info_btn");
const logout_btn = document.getElementById("logout_btn");



title.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
  location.href='main.php'
});

/* 로그인 상태가 아닐 때 나오는 버튼들 */
signup_btn.addEventListener("click", function(){ //로그인 버튼을 눌렀을 때
  location.href='signup_login/signup.php'
});

login_btn.addEventListener("click", function(){ //로그인 버튼을 눌렀을 때
  location.href='signup_login/login.php'
});


/* 로그인 상태일 때 나오는 버튼들 */
my_info_btn.addEventListener("click", function(){ //내 정보 버튼을 눌렀을 때
  location.href='login_confirm.php'
});

logout_btn.addEventListener("click", function(){ //로그아웃 버튼을 눌렀을 때
  location.href='logout.php'
});










