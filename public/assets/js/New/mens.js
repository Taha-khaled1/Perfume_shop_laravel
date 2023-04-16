/**************************************** select  plus/mins/num  ************************************************* */
let plus = document.querySelector(".plus");
let mins = document.querySelector(".mins");
let num = document.querySelector(".num");


let x = 1 ;

/**************************************** addEventListener click to plus/mins ************************************************* */
plus.addEventListener("click",()=>{
    num.innerHTML = x++;
})

mins.addEventListener("click",()=>{
    num.innerHTML = x--;
})

/**************************************** select  smallImage/mainImage  ************************************************* */
let smallImage = document.querySelectorAll(".images img");
let mainImage = document.querySelector(".main-image img");

/**************************************** addEventListener click to smallImage ************************************************* */
smallImage.forEach((img)=>{
    img.addEventListener("click",()=>{
        mainImage.src = img.src;
    })
})