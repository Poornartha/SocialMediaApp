module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
    textColor: ['responsive', 'hover', 'focus', 'group-hover'],
  },
  plugins: [
    require('tailwindcss-plugins/pagination'),
  ],
}
