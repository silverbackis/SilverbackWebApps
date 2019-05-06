const pkg = require('./package')

module.exports = {
  mode: 'universal',

  /*
   ** Headers of the page
   */
  head: {
    title: 'Silverback Web Apps',
    htmlAttrs: {
      lang: 'en-GB'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: pkg.description }
    ],
    link: [
      {
        rel: 'shortcut icon',
        type: 'image/png',
        href: 'icons/icon.png'
      }
    ]
  },

  /*
   ** Customize the progress-bar color
   */
  loading: {
    color: 'hsl(141, 71%,  48%)',
    failedColor: 'hsl(348, 100%, 61%)',
    height: '4px'
  },

  /*
   ** Global CSS
   */
  css: ['~/assets/css/main.sass'],

  /*
   ** Plugins to load before mounting the App
   */
  plugins: [
    { src: '~/plugins/fontawesome', ssr: true },
    { src: '~/plugins/gsap', ssr: false }
  ],

  /*
   ** Nuxt.js modules
   */
  modules: [
    '@nuxtjs/axios',
    [
      '@nuxtjs/pwa',
      {
        icon: {
          iconSrc: 'static/icons/icon-ios-1024.png'
        },
        manifest: {
          name: 'Silverback Web Apps',
          short_name: 'Silverback',
          description: pkg.description,
          lang: 'en-GB',
          background_color: '#303082',
          theme_color: '#0dbfba'
        },
        meta: {
          mobileAppIOS: true,
          theme_color: '#0dbfba'
        },
        optimize: {
          cssnano: {
            zindex: false
          }
        }
      }
    ],
    [
      '@nuxtjs/google-tag-manager',
      {
        id: 'GTM-MVSWS73'
      }
    ]
  ],
  /*
   ** Axios module configuration
   */
  axios: {
    // See https://github.com/nuxt-community/axios-module#options
  },

  /*
   ** Build configuration
   */
  build: {
    postcss: {
      preset: {
        features: {
          customProperties: false
        }
      }
    },
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {
      // Run ESLint on save
      if (ctx.isDev && ctx.isClient) {
        config.module.rules.push({
          enforce: 'pre',
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          exclude: /(node_modules)/
        })
      }
    }
  }
}
