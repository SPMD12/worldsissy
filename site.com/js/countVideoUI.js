let XHRvideoPlayerQuestion = new XMLHttpRequest();

// Настройка запроса
XHRvideoPlayerQuestion.open('GET', 'watch-video.php', true);

// Подписка на событие onreadystatechange и обработка его с помощью анонимной функции
XHRvideoPlayerQuestion.addEventListener('readystatechange', function() {
  // если состояния запроса 4 и статус запроса 200 (OK)
  if ((XHRvideoPlayerQuestion.readyState == 4) && (XHRvideoPlayerQuestion.status == 200)) {
    // например, выведем объект XHR в консоль браузера
    console.log(XHRvideoPlayerQuestion);
    // и ответ (текст), пришедший с сервера в окне alert
    console.log(XHRvideoPlayerQuestion.responseText);
    // получить элемент c id = video-player
    let idVideoPlayer = document.getElementById('video-player');
    // заменить содержимое элемента ответом, пришедшим с сервера
    idVideoPlayer.innerHTML = XHRvideoPlayerQuestion.responseText;
  }
}); 
// Отправка запроса на сервер
XHRvideoPlayerQuestion.send();