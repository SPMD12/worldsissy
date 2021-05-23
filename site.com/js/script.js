/*Выпадающие меню
$(".menu li ul").hide();
$(".menu li:has('.submenu')").hover(
  function(){
  $(".menu li ul").stop().fadeToggle(300);}
)
*/

// function myFunction(x) {
//   x.classList.toggle("change");
// }

(function(window) {
    var videoNode = window.document.querySelector('.videoStyle');
    var timeNode = window.document.querySelector('.time');
    videoNode.addEventListener('loadedmetadata', function(e) {
        var duration = videoNode.duration.toFixed(1);
        var m = duration % 60;
        timeNode.innerText = Math.floor(duration / 60) + ':' + (m < 10 ? '0' : '') + m;
    });
})(window);