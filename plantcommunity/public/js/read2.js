const revise_btn = document.getElementById("revise_btn");
const delete_btn = document.getElementById("delete_btn");
const delete_form = document.getElementById("delete_form");
const revise_form = document.getElementById("revise_form");



delete_btn.addEventListener("click", function(){ //삭제 버튼을 눌렀을 때
  var return_value = confirm("정말 삭제하시나요? 삭제 후 복구할 수 없습니다.");
  
  if (return_value == true) {
    delete_form.submit();
  }

});



revise_btn.addEventListener("click", function(){ //수정 버튼을 눌렀을 때
  revise_form.submit();
});
