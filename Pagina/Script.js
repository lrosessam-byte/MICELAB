const LElements = document.querySelectorAll(".btnLI");



LElements.forEach(LElement =>{

    LElement.addEventListener("click", () => {
        LElement.classList.toggle("arrow");
         
        let height=0;
        let menu=LElement.nextElementSibling;
        console.log(menu.clientHeight);
        if(menu.clientHeight=="0"){
            height=menu.scrollHeight;

        }
        menu.style.height=height+'px';

});
})
// This fires exactly one time, then unbinds itself automatically

const Einv=document.querySelector(".inv");
Einv.addEventListener("click", () => {
    window.location.href = "Formulacionp.php";
      });
const pre=document.querySelector(".pre");
pre.addEventListener("click", () => {
    window.location.href = "Premezclas.php";
      });
const rec=document.querySelector(".rec");
rec.addEventListener("click", () => {
    window.location.href = "ingresosdemp.php";
      });