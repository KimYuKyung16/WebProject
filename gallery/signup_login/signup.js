const signupForm = document.querySelector("#signup_form");
const signup_btn = document.querySelector("#signup_confirm_btn");
const id = document.querySelector("#id");
const pw = document.querySelector("#pw");
const pw_check = document.querySelector("#pw_check");

signup_btn.addEventListener("click", function(e) {
  if(pw.value && pw.value === pw_check.value){
    if (id.value == ''){
      alert("아이디를 입력하세요");
    } else {
      signupForm.submit();
    }    
  }else{
    alert("비밀번호가 서로 일치하지 않습니다");
  }
});