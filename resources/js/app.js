require('./bootstrap');

import Choices from 'choices.js';
import 'flowbite';
const choicesElements = document.querySelectorAll('.js-choices');

choicesElements.forEach((element) => {
    new Choices(element, {
        searchEnabled: false,
        itemSelectText: '',
        removeItemButton: true,
        maxItemCount: 5,    
    });
});