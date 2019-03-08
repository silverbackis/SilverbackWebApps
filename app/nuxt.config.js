const pkg = require('./package')
const path = require('path')

export default {
  mode: 'universal',
  /**
   * Headers of the page
   */
  head: {
    titleTemplate: '%s - Silverback Web Apps',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: pkg.description }
    ],
    link: [
      {
        rel: 'icon',
        type: 'image/png',
        href: 'icons/icon.png',
      }
    ]
  },
  /**
   * Customize the progress-bar color
   */
  loading: {
    color: "hsl(141, 71%,  48%)",
    failedColor: 'hsl(348, 100%, 61%)',
    height: "4px"
  },
  /**
   * Global CSS
   */
  css: ['~/assets/css/main.sass'],
  /**
   * Plugins
   */
  plugins: [
    { src: '~/plugins/fontawesome', ssr: true },
    { src: '~/plugins/gsap', ssr: false }
  ],
  /**
   * Modules
   */
  modules: [
    '@cwamodules/core',
    '@cwamodules/components',
    [
      '@cwamodules/bulma',
      {
        pagesDepth: 3,
        components: {
          Hero: '~/components/bwstarter/Hero',
          HomeHero: '~/components/hero/Home',
          HowWeWorkHero: '~/components/hero/HowWeWork',
          WhyChooseUsHero: '~/components/hero/WhyChooseUs',
          PricingHero: '~/components/hero/Pricing',
          ContactHero: '~/components/hero/Contact'
        }
        //, disabledComponents: ['Hero', 'Content', 'Form'],
        // enabledComponents: null
      }
    ],
    '@nuxtjs/component-cache',
    [
      '@nuxtjs/axios',
      {
        credentials: true,
        debug: false
      }
    ],
    [
      '@nuxtjs/google-tag-manager',
      {
        id: 'GTM-MVSWS73'
      }
    ],
    [
      '@nuxtjs/pwa',
      {
        icon: {
          iconSrc: 'static/icons/icon.png',
          sizes: [1024, 512, 144]
        },
        manifest: true,
        meta: false,
        // Causes issues in safari when requesting pages when authentication changes (annonymous/authenticated user)
        // workbox: {
        //   runtimeCaching: [
        //     {
        //       urlPattern: process.env.API_URL_BROWSER + '/.*',
        //       handler: 'networkFirst',
        //       method: 'GET'
        //     }
        //   ]
        // },
        optimize: {
          cssnano: {
            zindex: false
          }
        }
      }
    ]
  ],
  /**
   * Manifest for mobile app
   */
  manifest: {
    name: 'Onsem',
    short_name: 'Onsem',
    description: '',
    lang: 'en',
    background_color: '#FFFFFF',
    theme_color: '#1990EB'
  },
  /**
   * Build configuration
   */
  build: {
    // analyze: true,
    postcss: {
      preset: {
        features: {
          customProperties: false
        }
      }
    },
    /*
    ** Run ESLINT on save
    */
    extend(config, { isDev }) {
      // cwamodules should pre-compile but this will work for now
      config.resolve.alias['vue'] = 'vue/dist/vue.common'
      config.resolve.extensions.push('.sass')

      for (let plugin of config.plugins) {
        if (plugin.constructor.name === 'HtmlWebpackPlugin') {
          plugin.options = Object.assign(plugin.options, {
            chunksSortMode: 'none'
          })
        }
      }

      // Run ESLint on save
      if (isDev && process.client) {
        config.module.rules.push({
          enforce: 'pre',
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          exclude: /(node_modules)/
        })
      }
    }
  },
  /**
   * Router
   */
  router: {
    middleware: ['initErrorHandler']
  },
  serverMiddleware: [
    // API middleware
    '~/server/index.js'
  ]
}
