import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    safelist : [
        'rounded-md',
        {pattern: /bg-(red|green|blue)-(100|200|300)/},
        {pattern: /text-(red|green|blue)-(500|600|700)/},
    ],
   
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree'],
            },
         
        },
    },
    plugins: [],
  
  
};
