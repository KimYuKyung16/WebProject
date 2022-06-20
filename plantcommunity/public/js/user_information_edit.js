const profile_select_btn = document.getElementById("profile_select_btn"); // 프로필 설정 버튼
const inputfile = document.querySelector(".inputfile"); // 파일 업로드
const profile_save_btn = document.getElementById("profile_save_btn"); // 프로필 사진 저장 버튼 
const user_info_save_form = document.getElementById("user_info_save_form"); // 이미지 업로드 폼태그
const user_info_save_form2 = document.getElementById("user_info_save_form2"); // 닉네임 저장 폼태그
const selected_profile = document.getElementById("selected_profile"); // 선택된 프로필 사진
const nickname_save_btn = document.getElementById("nickname_save_btn"); // 닉네임 저장 버튼 
const nickname = document.getElementById("nickname"); // 닉네임 값


// 프로필 설정 버튼을 클릭했을 때
profile_select_btn.addEventListener("click", function(){
    inputfile.click();
});

// 파일 업로드를 했을 때
inputfile.addEventListener('change', updateImageDisplay);

// 이미지 타입 변수
const fileTypes = [
    'image/jpeg',
    'image/pjpeg',
    'image/png'
];

// 첨부한 이미지를 적용하는 함수
function updateImageDisplay() {
    const curFiles = inputfile.files; // 업로드된 파일이 담겨있음.
    if (curFiles.length === 0) { // 파일 업로드 X
        console.log("선택된 파일 X");
    } else { // 파일 업로드 O
        for (const file of curFiles) {
            if (fileTypes.includes(file.type)) { // fileTypes 변수 안에 들어있는 파일 형식일 떄
                selected_profile.src = URL.createObjectURL(file); // 선택된 프로필 사진을 업로드할 사진으로 변경
            } else { // fileTypes 변수 안에 들어있는 파일 형식이 아닐 때
                console.log("잘못된 파일형식");
            }
        }
    }
}

// 프로필 저장 버튼 클릭 
profile_save_btn.addEventListener("click", function(){
    let checkfile = inputfile.files; // 업로드된 파일이 담겨있음.
    if (checkfile.length === 0) { // 파일 업로드 X
        alert("업로드할 이미지가 없습니다. 이미지를 선택하세요.")
    } else { // 파일 업로드 O
        user_info_save_form.submit()
    }
});

// 닉네임 저장 버튼 클릭 
nickname_save_btn.addEventListener("click", function(){
    if (nickname.value != "") { // 닉네임값 O
        user_info_save_form2.submit();
    } else { // 닉네임값 X
        alert("닉네임을 입력하세요.")
    }
});


