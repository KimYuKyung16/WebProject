import { getAuth, signInWithPopup, GoogleAuthProvider } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';
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

const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const db = getFirestore(app);
/////////////

const login_btn = document.getElementById("login_btn");

async function firestore_write(email){
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

const user_add_form = document.getElementById("user_add_form")
const email = document.getElementById("email")


function authpopup(){
  signInWithPopup(auth, provider)
    .then((result) => {
      // This gives you a Google Access Token. You can use it to access the Google API.
      const credential = GoogleAuthProvider.credentialFromResult(result);
      const token = credential.accessToken;
      // The signed-in user info.
      const user = result.user;
      // ...

      email.value = user.email;
      user_add_form.submit();

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



login_btn.onclick = authpopup
//document.getElementById("firestore_btn").onclick = firestore_write
