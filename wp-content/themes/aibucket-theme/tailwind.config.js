const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        // `.container` caps at the 1200px site width (theme.json wideSize)
        // with 16px/20px gutters, matching the header, footer and home sections.
        container: {
            screens: {
                sm: '600px',
                md: '782px',
                lg: '960px',
                xl: tailpress.theme('settings.layout.wideSize', theme)
            },
            padding: {
                DEFAULT: '1rem',
                sm: '1.25rem'
            },
        },
        extend: {
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
            fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme)),
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans]
            },
            maxWidth: {
                // ~720px long-form reading column (trust pages, newsletter, intros).
                'reading': '720px',
                // Overall site content width (header, footer, homepage sections).
                'site': tailpress.theme('settings.layout.wideSize', theme)
            }
        },
        // Breakpoints are fixed values so changing theme.json layout sizes
        // never shifts the responsive behaviour of existing templates.
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '782px',
            'lg': '960px',
            'xl': '1280px',
            '2xl': '1440px'
        }
    },
    plugins: [
        tailpress.tailwind,
        require('flowbite/plugin')
    ]
};
