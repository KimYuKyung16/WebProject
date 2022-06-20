import { getAuth, onAuthStateChanged, GoogleAuthProvider } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";

const provider = new GoogleAuthProvider();
const auth = getAuth();
auth.languageCode = 'it';

///////////////
const firebaseConfig = {
    apiKey: "AIzaSyCHINcntS5pZQkjgXY33uoWrwwbeIR7SV0",
    authDomain: "ireum-project.firebaseapp.com",
    projectId: "ireum-project",
    storageBucket: "ireum-project.appspot.com",
    messagingSenderId: "912854040938",
    appId: "1:912854040938:web:80ea54dc415e94c59b6513",
    measurementId: "G-8H16XTD8L9"
  };

const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
// const db = getFirestore(app);
/////////////

const write_form = document.getElementById("write_form")
const title = document.getElementById("title")
const content = document.getElementById("content")
const email = document.getElementById("email")
const save_btn = document.getElementById("save_btn")
const main_title = document.getElementById("main_title")


function google_user_confirm(){ //구글 로그인 사용자 확인용
  onAuthStateChanged(auth, (user) => { //현재 사용자가 누구인지 알 수 있음.
    if (user) { //로그인이 되어있을 때
      const uemail = user.email; 
      email.value = uemail; //email의 value를 현재 로그인 된 이메일값으로 변경
        
    } else { //로그인이 되어있지 않을 때
      console.log("로그인X");
    }
  });
}

google_user_confirm();

save_btn.addEventListener("click", function(){ //저장 버튼을 눌렀을 때
    if (title.value != "" && content.value != "") {
        write_form.submit();
    }
    else {
      alert("제목 또는 내용을 입력해주세요");
    }
});

main_title.addEventListener("click", function(){ //저장 버튼을 눌렀을 때
  location.href='index2.php'
});



