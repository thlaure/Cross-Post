import defaultTheme from 'tailwindcss/defaultTheme';

const colors = require('tailwindcss/colors');

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
            colors: {
                'primary': 'var(--color-primary)',
                'secondary': 'var(--color-secondary)',
                'tertiary': 'var(--color-tertiary)',
                'muted': 'var(--color-muted)',
                'success': {
                    'border': 'var(--color-success-medium)',
                    'background': 'var(--color-success-light)',
                    'text': 'var(--color-success-deep)',
                    'text-hover': 'var(--color-success-deep)',
                },
                'error': {
                    'border': 'var(--color-error)',
                    'text': 'var(--color-error)',
                },
            },
        },
        container: {
            center: true,
        },
        backgroundImage: {
            'cta-gradient': 'linear-gradient(to right, var(--color-cta-from), var(--color-cta-via), var(--color-cta-to))',
            'main-gradient': 'linear-gradient(to right, var(--color-primary), var(--color-secondary))',
        },
    },
    plugins: [],
};
