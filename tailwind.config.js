import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: ['variant', [
        '@media (prefers-color-scheme: dark) { &:not(.light *) }',
        '&:is(.dark *)',
    ]],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#1D4ED8', // Ganti dengan warna utama Anda
                secondary: '#9333EA', // Ganti dengan warna sekunder Anda
                // Tambahkan warna lain sesuai kebutuhan
            },
        },
    },
    plugins: [],
};
