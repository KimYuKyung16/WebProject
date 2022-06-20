const save_btn = document.getElementById("save_btn");
const revise_form = document.getElementById("revise_form");


save_btn.addEventListener("click", function(){
  revise_form.submit();
});