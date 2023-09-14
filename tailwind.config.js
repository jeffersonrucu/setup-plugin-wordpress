// https://tailwindcss.com/docs/configuration
module.exports = {
  // prefix: 'tw-',
  content: ["./index.php", "./src/resources/**/*.{php,vue,js,ts}"],
  theme: {
    extend: {
      fontFamily: {
        lato: ["Lato", "sans-serif"],
      },
      colors: {
      },
      container: {
        screens: {
          'sm': '576px',
          'md': '768px',
          'lg': '992px',
          'xl': '1140px',
          '2xl': '1140px',
        },
        center: true,
        padding: {
          DEFAULT: '15px'
        },
      },
      screens: {
        'xs': '375px',
        'sm': '576px',
        'md': '768px',
        'lg': '992px',
        'xl': '1200px',
        '2xl ': '1200px',
      },
    },

    plugins: [],
  }
};
