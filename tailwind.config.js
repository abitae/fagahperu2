import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        theme: {
            screens: {
              sm: '480px',
              md: '768px',
              lg: '976px',
              xl: '1440px',
            },
            colors: {
              gray: colors.gray,
              blue: colors.blue,
              red: colors.rose,
              pink: colors.fuchsia,
            },
            fontFamily: {
              sans: ['Graphik', 'sans-serif'],
              serif: ['Merriweather', 'serif'],
            },
            extend: {
              spacing: {
                '128': '32rem',
                '144': '36rem',
              },
              borderRadius: {
                '4xl': '2rem',
              }
            }
          },
    },
    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
