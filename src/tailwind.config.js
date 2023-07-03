const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
  content: [
'./vendor/laravel/jetstream/**/*.blade.php',
  './storage/framework/views/*.php',
  './resources/views/**/*.blade.php',
    ],
  theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                green: {
                    50: '#F3FAF7',
                    100: '#DEF7EC',
                    200: '#BCF0DA',
                    300: '#84E1BC',
                    400: '#31C48D',
                    500: '#0e9f6e',
                    600: '#057A55',
                    700: '#046C4E',
                    800: '#03543F',
                    900: '#014737',
                },
            }
        },
    },
  plugins: [], 
}
