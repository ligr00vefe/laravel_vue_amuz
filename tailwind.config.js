const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                xs: ['14px', '1.3'],
                sm: ['16px', '1.3'],
                base: ['18px', '1.3'],
                lg: ['20px', '1.3'],
                xl: ['22px', '1.3'],
                '2xl': ['24px', '1.3'],
                '3xl': ['26px', '1.4'],
                '4xl': ['30px', '1.4'],
                '5xl': ['38px', '1.5'],
            }
        },        
    },

    plugins: [require('@tailwindcss/forms')],
};
