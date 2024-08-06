import defaultTheme from 'tailwindcss/defaultTheme';
const colors = require('tailwindcss/colors');
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: ['class', '[data-mode="dark"]'],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        'node_modules/@frostui/tailwindcss/**/*.js'
    ],

    theme: {

        container: {
            center: true,
        },

        fontFamily: {
            sans: ['Figtree', 'sans-serif'],
        },

        extend: {
            colors: {
                'primary': '#3e60d5',
                'secondary': '#6c757d',
                'success': '#47ad77',
                'info': '#16a7e9',
                'warning': '#ffc35a',
                'danger': '#f15776',
                'light': '#f2f2f7',
                'dark': '#212529',

                'gray': {
                    ...colors.gray,
                    '800': '#313a46'
                }
            },

            minWidth: theme => ({
                ...theme('width'),
            }),


            maxWidth: theme => ({
                ...theme('width'),
            }),

            minHeight: theme => ({
                ...theme('height'),
            }),

            maxHeight: theme => ({
                ...theme('height'),
            }),
        },
    },

    plugins: [
        forms,
        require('@frostui/tailwindcss/plugin')
    ],
};
