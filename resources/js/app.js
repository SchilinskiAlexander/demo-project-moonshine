import './bootstrap';
import './main';

import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'

window.Alpine = Alpine

document.addEventListener('DOMContentLoaded', () => {
    Alpine.plugin(focus)
    Alpine.start()
})
