/*Выпадающие меню
$(".menu li ul").hide();
$(".menu li:has('.submenu')").hover(
  function(){
  $(".menu li ul").stop().fadeToggle(300);}
)
*/

function myFunction(x) {
  x.classList.toggle("change");
}
