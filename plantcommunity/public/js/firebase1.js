// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
import { getAuth, onAuthStateChanged, signInWithPopup, GoogleAuthProvider, signOut } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';


// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyCHINcntS5pZQkjgXY33uoWrwwbeIR7SV0",
  authDomain: "ireum-project.firebaseapp.com",
  projectId: "ireum-project",
  storageBucket: "ireum-project.appspot.com",
  messagingSenderId: "912854040938",
  appId: "1:912854040938:web:80ea54dc415e94c59b6513",
  measurementId: "G-8H16XTD8L9"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

const auth = getAuth();
