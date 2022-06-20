// 이미지 수정 플러스 이미지
const frontImg = document.getElementById("frontImg");
// 파일 업로드 인풋태그
const inputfile = document.querySelector(".inputfile");
// 저장 버튼 
const modal_okay_btn = document.getElementById("modal_okay_btn");
// 이미지 업로드 폼태그
const save_img_form = document.getElementById("save_img_form");
// 작품 삭제 버튼
const delete_btn = document.getElementById("delete-btn");

//이미지 플러스 클릭
frontImg.onclick = () => {
    inputfile.click();
}

// 파일 업로드 인풋 이벤트 리스너
inputfile.addEventListener('change', updateImageDisplay);

// 저장버튼 클릭 
modal_okay_btn.onclick = () => {
    let checkfile = inputfile.files;
    //또는 이전 사진과 같다면 조건하나 추가해야함
    if (checkfile.length === 0) {
        alert("업로드할 이미지 없음")
    } else {
        save_img_form.submit()
    }
}

// 이미지 타입 변수
const fileTypes = [
    'image/jpeg',
    'image/pjpeg',
    'image/png'
];

// 첨부한 이미지 적용 함수
function updateImageDisplay() {
    const curFiles = inputfile.files;
    if (curFiles.length === 0) {
        console.log("선택된 파일 없음.");
    } else {
        for (const file of curFiles) {
            if (fileTypes.includes(file.type)) {
                backImg.src = URL.createObjectURL(file);
            } else {
                console.log("잘못된 파일형식");
            }
        }
    }
}


delete_btn.addEventListener('click', function(){
    var return_value = confirm("정말 삭제하시나요?");
  
    if (return_value == true) {
      delete_form.submit();
    }
});