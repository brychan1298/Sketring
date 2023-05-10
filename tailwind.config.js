/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        boxShadow: {
            '3xl': '0px 10px 30px rgba(38, 45, 118, 20%)',
        }
    }
  },
  plugins: [],
}

