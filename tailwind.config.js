const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                rajdhani: ['Rajdhani'],
            },
            colors: {
                'main-blue': '#615dfa',
                
                'main-blue-capri': '#1abcff',

                'main-cyan': '#23d2e2',

                'main-red': '#fd434f',

                'main-green': '#00e194',

                'main-purple': '#7b5dfa',   
                
                'main-pink': '#f8468d',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
