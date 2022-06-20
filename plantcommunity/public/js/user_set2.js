import { getAuth, onAuthStateChanged, GoogleAuthProvider } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
import { getFirestore, collection, addDoc, doc, setDoc, getDocs, query, where, getDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

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
const db = getFirestore(app);
/////////////

const nickname_form = document.getElementById("nickname_form")
const nickname = document.getElementById("nickname")
const email = document.getElementById("email")
const save_btn = document.getElementById("save_btn")


function google_user_confirm(){ //구글 로그인 사용자 확인용
    onAuthStateChanged(auth, (user) => { //현재 사용자가 누구인지 알 수 있음.
    if (user) {
        const uemail = user.email;
        console.log("이메일:", uemail);
        email.value = uemail

    } else {
        // User is signed out
    }
    });
}

google_user_confirm();



save_btn.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
    if (nickname.value != ""){
      nickname_form.submit();
    }
    
    // location.href='gallery_add.php'
  });