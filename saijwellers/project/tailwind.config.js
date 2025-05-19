/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{js,ts,jsx,tsx}'],
  theme: {
    extend: {
      fontFamily: {
        serif: ['Playfair Display', 'Georgia', 'serif'],
        sans: ['Inter', 'sans-serif'],
      },
      colors: {
        gold: {
          50: '#FBF8E6',
          100: '#F7F1CC',
          200: '#F0E399',
          300: '#E9D566',
          400: '#E2C733',
          500: '#D4AF37', // Primary gold
          600: '#AA8C2C',
          700: '#7F6921',
          800: '#554616',
          900: '#2A230B',
        },
        silver: {
          50: '#F8F9FA',
          100: '#F1F2F5',
          200: '#E2E5EC',
          300: '#D2D8E2',
          400: '#C0C0C0', // Primary silver
          500: '#A9A9A9',
          600: '#8C8C8C',
          700: '#6E6E6E',
          800: '#505050',
          900: '#323232',
        },
      },
      animation: {
        'shimmer': 'shimmer 2s infinite',
      },
      keyframes: {
        shimmer: {
          '100%': { transform: 'translateX(100%)' },
        }
      },
    },
  },
  plugins: [],
};