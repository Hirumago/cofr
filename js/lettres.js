let first_button = document.querySelector("#test button:first-of-type");
let second_button = document.querySelector("#test button:nth-of-type(2)");

first_button.addEventListener("click", function(){
    alert("first");
});
second_button.addEventListener("click", function(){
    alert("second");
});