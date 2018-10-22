module.exports = {
  url: 'http://localhost/jetWP/',
  dev: {
    saas: {
      ltr: {
        url: './assets/sass/**/*.scss',
        exclude: '!assets/sass/{rtl,rtl/**/*}'
      },
      rtl: {
        url: 'assets/sass/rtl/**/*.scss'
      }
    }
  },
  prod: {
    names: {
      css: 'dist',
      js: 'dist'
    },
    paths: {
      css: './',
      js: './assets/js/',
    },
    browsers: [
      'last 2 version',
      '> 1%',
      'ie >= 11',
      'last 2 Android versions',
      'last 2 ChromeAndroid versions',
      'last 2 Chrome versions',
      'last 2 Firefox versions',
      'last 2 Safari versions',
      'last 2 iOS versions',
      'last 2 Edge versions',
      'last 2 Opera versions',
      'safari 8'
    ]
  }
};