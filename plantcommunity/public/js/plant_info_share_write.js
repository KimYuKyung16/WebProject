import { getAuth, onAuthStateChanged, GoogleAuthProvider } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
import { getFirestore, collection, addDoc, doc, setDoc, getDocs, query, where } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

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

const title = document.getElementById("title");
const content = document.getElementById("content");
const save_btn = document.getElementById("save_btn");
const test = document.getElementById("test");


function date(){ //날짜를 구해주는 함수
    var today = new Date();

    var year = today.getFullYear();
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    var day = ('0' + today.getDate()).slice(-2);

    var dateString = year + '.' + month  + '.' + day;
    return dateString
}

function time(){ //시간을 구해주는 함수
    var today = new Date();   

    var hours = ('0' + today.getHours()).slice(-2); 
    var minutes = ('0' + today.getMinutes()).slice(-2);
    var seconds = ('0' + today.getSeconds()).slice(-2); 
    
    var timeString = hours + ':' + minutes  + ':' + seconds;
    return timeString
}


async function firestore_write(email){ //plant_info_share에서 글을 썼을 때 추가
    try {
      const contentsRef = await setDoc(doc(db, "users", email, "plant_info_share", "content0"),{
        order: 0,
        title: title.value,
        conent: content.value,
        click_count: 0,
        date: date(),
        time: time()
      });

      //console.log("갤러리이름: ", gallery_name.value);
      
    } catch (e) {
      console.error("Error adding document: ", e);
    }
    location.href='plant_info_share.html'
  }

  async function firestore_write_test(email){ //plant_info_share에서 글을 썼을 때 추가
    try {
      const contentsRef = await setDoc(doc(db, "plant_info_share", "total_contents", "contents", "content0"),{
        order: 0,
        title: title.value,
        conent: content.value,
        click_count: 0,
        date: date(),
        time: time(),
        writer: email
      });

      //console.log("갤러리이름: ", gallery_name.value);
      
    } catch (e) {
      console.error("Error adding document: ", e);
    }
    location.href='plant_info_share.html'
  }

function google_user_confirm(){
    onAuthStateChanged(auth, (user) => { //현재 사용자가 누구인지 알 수 있음.
    if (user) {
        const uemail = user.email;
        console.log("이메일:", uemail);
        //firestore_write(uemail)
        firestore_write_test(uemail)

        test1(uemail) /////
        
    } else {
        // User is signed out
        // ...
    }
    });
}

var i = 0;

async function test1(email){
    const contentsRef = collection(db, "users", email, "plant_info_share");
    const q = query(contentsRef, where("order", "!=", null));
    const querySnapshot = await getDocs(q);

    querySnapshot.forEach((doc) => {
    // doc.data() is never undefined for query doc snapshots
    console.log(doc.id, " => ", doc.data());
    i++
    });

    console.log(i)
}




save_btn.addEventListener("click", google_user_confirm);
test.addEventListener("click", test1);


