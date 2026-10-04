const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    important:true,
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            'xs': '300px',
            // => @media (min-width: 300px) { ... }

            ...defaultTheme.screens,
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            }
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
