import defaultTheme from 'tailwindcss/defaultTheme'
import daisyui from "daisyui";
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    plugins: [typography, daisyui],
    content: ['./resources/**/*.{js,svelte,blade.php}'],
    theme: {
        extend: {
            colors: {
                indigo: {
                    100: '#e6e8ff',
                    300: '#b2b7ff',
                    400: '#7886d7',
                    500: '#6574cd',
                    600: '#5661b3',
                    800: '#2f365f',
                    900: '#191e38',
                },
            },
            fontFamily: {
                sans: ['"Cerebri Sans"', ...defaultTheme.fontFamily.sans],
            },
        },
    },
}
