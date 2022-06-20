import { getAuth, onAuthStateChanged, signInWithPopup, GoogleAuthProvider, signOut } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';
import { setPersistence, signInWithEmailAndPassword, browserSessionPersistence } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';

import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
import { getFirestore, collection, addDoc, doc, setDoc, getDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";


const provider = new GoogleAuthProvider();
const auth = getAuth();
auth.languageCode = 'it';

//////////
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
const db = getFirestore(app);

const main_title = document.getElementById("main_title");
const product_image = document.getElementById("product_image");
const login_title = document.getElementsByClassName("login_title");
const login_btn = document.getElementById("login_btn");
const my_info = document.getElementById("my_info");
const side_menu1 = document.getElementById("side_menu1")
const side_menu2 = document.getElementById("side_menu2")
const my_nickname = document.getElementsByClassName("my_nickname")
const logout_btn = document.getElementById("logout_btn")
const page_num_form = document.getElementById("page_num_form")





const toggleBtn = document.querySelector(".navbar_togglebBtn")
const menu = document.querySelector(".navbar_menu")
const icons = document.querySelector(".navbar_icons")


toggleBtn.addEventListener('click', ()=>{
  menu.classList.toggle('active');
  icons.classList.toggle('active');
});






var login_state = 0;

google_user_confirm()

function change(email){
    // const docRef = doc(db, "users", email);
    // const docSnap = await getDoc(docRef);

    // if (docSnap.exists()) {
    //     console.log("Document data:", docSnap.data().nickname);
    //   } else {
    //     // doc.data() will be undefined in this case
    //     console.log("No such document!");
    //   }

  //   const mysql = require('mysql');  // mysql 모듈 로드
  //   const connect = {
  //     host: 'localhost',
  //     user: 'kyk',
  //     database: 'plant_db',
  //     password: '3909',
  //   };

  //   let connection = mysql.createConnection(conn); // DB 커넥션 생성
  //   connection.connect();   // DB 접속

  //   let sql = "SELECT * FROM users WHERE email = email";
    
  //   connection.query(sql, function (err, results, fields) { 
  //     if (err) {
  //         console.log(err);
  //     }
  //     console.log(results);
  //   });
   
   
  // connection.end(); // DB 접속 종료


    // my_nickname[0].innerHTML = email;
    
    // product_image.src = "./image/plant.jpg";
}




// window.onload = function(){
//     onAuthStateChanged(auth, (user) => { //현재 사용자가 누구인지 알 수 있음.
//         if (user) {
//             const uemail = user.email;
//             console.log("현재 로그인되어 있는 이메일:", uemail);
//             firestore_write(uemail)
//             change()
            
//         } else {
//             // User is signed out
//             // ...
//             console.log("로그인 아님");
//         }
//     });
// }


function google_user_confirm(num){
    onAuthStateChanged(auth, (user) => { //현재 사용자가 누구인지 알 수 있음.
        if (user) {
            const uemail = user.email;
            
            console.log("로그인이 되어 있는 상태");
            console.log("로그인 된 구글 이메일:", uemail);
            login_state = 1;
            // // change(uemail);
            // side_menu1.style.display = "none";
            // side_menu2.style.display = "block";

        } else {
            // User is signed out
            // ...
            login_state = 0;
            console.log("로그인 아님");
            //location.href='gallery_list.html'
            //side_menu.style.display = "";
        }
    });
  }





function logout(){
  const auth = getAuth();
  signOut(auth).then(() => {
    location.href='logout.php'
  }).catch((error) => {
    alert("오류");
  });
}


login_btn.addEventListener("click", function(){
    if (login_state == 0){
        location.href='login.html'
    }
    else{
        console.log("이미 로그인 상태임");
        //location.href='login_after.html'
    }
    
  });

my_info.addEventListener("click", function(){
    if (login_state == 0){
        location.href='login.html'
    }
    else{
        console.log("이미 로그인 상태임");
        // page_num_form.submit();
        location.href='user_information.php' //내 정보창으로 보내주기
    }
    
  });

  main_title.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
    location.href='index2.php'
  });

  logout_btn.addEventListener("click", function(){ //로그아웃 버튼을 눌렀을 때
    logout();
  });




   

