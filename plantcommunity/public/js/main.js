import { getAuth, onAuthStateChanged, signInWithPopup, GoogleAuthProvider } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
import { getFirestore, collection, addDoc, doc, setDoc } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";


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

const product_image = document.getElementById("product_image");
const login_title = document.getElementsByClassName("login_title");
const login_btn = document.getElementById("login_btn");


google_user_confirm()

function change() {
  login_title[0].innerHTML = "하이";
  product_image.src = "./image/plant.jpg";
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


async function firestore_write(email) {
  try {
    const docRef = await setDoc(doc(db, "users", email), {
      name: "김유경",
      born: 2000
    });
    console.log("Document written with ID: ", docRef.id);
  } catch (e) {
    console.error("Error adding document: ", e);
  }
}

function google_user_confirm(num) {
  onAuthStateChanged(auth, (user) => { //현재 사용자가 누구인지 알 수 있음.
    if (user) {
      const uemail = user.email;
      console.log("로그인이 되어 있는 상태");
      console.log("로그인 된 구글 이메일:", uemail);

    } else {
      // User is signed out
      // ...
      console.log("로그인 아님");
      //location.href='gallery_list.html'
    }
  });
}




function authpopup() {
  signInWithPopup(auth, provider)
    .then((result) => {
      // This gives you a Google Access Token. You can use it to access the Google API.
      const credential = GoogleAuthProvider.credentialFromResult(result);
      const token = credential.accessToken;
      // The signed-in user info.
      const user = result.user;
      // ...

      //window.localStorage.setItem('email', 'hi'); //////추가

      firestore_write(user.email)
      location.href = 'user_set.html'

    }).catch((error) => {
      // Handle Errors here.
      const errorCode = error.code;
      const errorMessage = error.message;
      // The email of the user's account used.
      const email = error.email;
      // The AuthCredential type that was used.
      const credential = GoogleAuthProvider.credentialFromError(error);
      // ...
    });
}



login_btn.addEventListener("click", function () {
  location.href = 'login.html'
});





