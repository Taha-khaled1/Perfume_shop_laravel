

let smallImg = document.querySelectorAll(".images img");
let BigImg = document.querySelector(".main-image img");

smallImg.forEach((img)=>{
    img.addEventListener("click",()=>{
        BigImg.src = img.src;
    })
})


let plus = document.querySelector(".plus");
let num = document.querySelector(".num");
let minus = document.querySelector(".minus");

let counter = 1;
let max = $(num).data("max");
let count = () => max - counter;

plus.addEventListener("click", () => {
  if (counter < max) {
    counter++;
    num.innerHTML = counter;
    quantity.value = counter;
    $(".quantity_num").html(count());
  } else {
    num.innerHTML = max;
    quantity.value = max;
  }
});

minus.addEventListener("click", () => {
  if (counter > 1) {
    counter--;
    num.innerHTML = counter;
    quantity.value = counter;
    $(".quantity_num").html(count());
  } else {
    num.innerHTML = 1;
    quantity.value = 1;
  }
});
