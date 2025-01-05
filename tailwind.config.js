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
                'gray': 'var(--color-gray)',
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
                'cta': {
                    'from': 'var(--color-cta-from)',
                    'via': 'var(--color-cta-via)',
                    'to': 'var(--color-cta-to)',
                    'from-hover': 'rgba(var(--color-cta-from), 0.8)',
                    'via-hover': 'rgba(var(--color-cta-via), 0.8)',
                    'to-hover': 'rgba(var(--color-cta-to), 0.8)',
                    'bg': 'var(--color-cta-bg)',
                    'border': 'var(--color-cta-border)',
                    'bg-hover': 'rgba(var(--color-cta-bg), 0.6)',
                }
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
