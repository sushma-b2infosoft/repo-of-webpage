import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
         "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    

    theme: {
        extend: {
            colors: {
        primary: {
          light: "#4f9cf9",   // blue shade
          DEFAULT: "#1d72f3",
          dark: "#1558c0",
        },
        background: "#f8fafc",  // light gray background
        card: "#ffffff", 
    },
},      

        fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    

    plugins: [forms],
};
20879408