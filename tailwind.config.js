const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.js",
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Varela Round','Montserrat', ...defaultTheme.fontFamily.sans],
            },
            zIndex: {
                '-1': '-1',
            },
            flexGrow: {
                '5' : '5'
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
