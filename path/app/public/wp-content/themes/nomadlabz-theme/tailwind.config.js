/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './assets/js/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#4bffb9',
          '50': '#e6fff7',
          '100': '#ccffef',
          '200': '#99ffdf',
          '300': '#66ffcf',
          '400': '#4bffb9',
          '500': '#00ff99',
          '600': '#00cc7a',
          '700': '#00995c',
          '800': '#00663d',
          '900': '#00331f',
        },
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
      },
      animation: {
        'fade-in': 'fadeIn 0.6s ease-in-out',
        'slide-up': 'slideUp 0.6s ease-out',
        'scale-in': 'scaleIn 0.5s ease-out',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { transform: 'translateY(20px)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
        scaleIn: {
          '0%': { transform: 'scale(0.9)', opacity: '0' },
          '100%': { transform: 'scale(1)', opacity: '1' },
        },
      },
    },
  },
  plugins: [],
}


