"use strict";

let ProfileMenu = document.getElementById('profile-wrap');
let iconElem = ProfileMenu.querySelector('.profile-icon');

    iconElem.onclick = function() {
    ProfileMenu.classList.toggle('open');
};