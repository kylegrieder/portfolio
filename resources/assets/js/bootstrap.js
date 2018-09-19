
window._ = require('lodash');
window.Popper = require('popper.js').default;

// bootstrap
try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

// axios
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// csrf token
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
