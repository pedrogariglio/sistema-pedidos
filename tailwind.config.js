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
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    safelist: [
        'text-red-500',
        'text-yellow-500',
        'text-green-500',
        'border-red-500',
        'bg-indigo-500',
        'bg-indigo-600',
        'bg-indigo-700',
        'focus:ring-indigo-500'
    ],
    
    plugins: [],
};
