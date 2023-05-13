require('./bootstrap');

import Choices from 'choices.js';

const choicesElements = document.querySelectorAll('.js-choices');

choicesElements.forEach((element) => {
    new Choices(element, {
        searchEnabled: false,
        itemSelectText: '',
        removeItemButton: true,
        maxItemCount: 5,    
    });
});