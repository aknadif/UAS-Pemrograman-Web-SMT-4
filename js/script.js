'use strict';

var searchBox = document.querySelectorAll('.search-box input[type="text"] + span');

searchBox.forEach(elm => {
    elm.addEventListener('onmouseover', () => {
        elm.previousElementSibling.value = '';
    });
});