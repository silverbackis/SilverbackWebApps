<template>
  <div class="layout">
    <div class="site-content">
      <div>
        <nav-bar
          class="is-transparent is-dark"
          :style="{
            backgroundColor: `rgba(48,48,130,${navOpacity})`
          }"
        />
      </div>
      <nuxt />
    </div>
    <footer class="footer">
      <div class="container">
        <div class="footer-logos">
          <img src="~assets/images/logo-fsb.png" alt="FSB Logo" />
          <img src="~assets/images/logo-carbon.svg" alt="Carbon Neutral Logo" />
        </div>
        <div class="help">
          <span class="is-inline-block">
            &copy; {{ new Date().getFullYear() }} Silverback Internet Services
            Limited
          </span>
          <span class="is-inline-block">VAT: GB 177 0995 64</span>
          <span class="is-inline-block">Company Number: 07120829</span>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import NavBar from '~/components/layout/NavBar'
export default {
  components: {
    NavBar
  },
  data() {
    return {
      navOpacity: 0
    }
  },
  watch: {
    $route() {
      window.Intercom('update')
    }
  },
  mounted() {
    window.addEventListener('scroll', this.updateNavOpacity)
    window.Intercom('boot', {
      app_id: 'zqlbryjc'
    })
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.updateNavOpacity)
  },
  methods: {
    updateNavOpacity() {
      this.navOpacity = Math.max(
        Math.min((window.scrollY - 120) / 150, 0.97),
        0
      )
    }
  }
}
</script>

<style lang="sass">
@import 'assets/css/_vars'
@import '~bulma/sass/utilities/mixins'
.layout
  display: flex
  min-height: 100vh
  flex-direction: column
  background: $white
  .page
    padding-bottom: 3rem
  +desktop
    .navbar
      height: $navbar-height-desktop
  .site-content
    flex: 1 0 auto
  .footer
    position: relative
    color: $white
    padding-top: 5vw
    padding-bottom: 90px
    text-align: right
    line-height: 1.1rem
    &:before
      content: ''
      position: absolute
      top: -1px
      left: 0
      width: 100%
      height: 6vw
      max-height: 120px
      background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' height='10000' width='10000'%3E%3Cpolygon points='0,0 1,10000 10000,0' stroke='white' fill='white' /%3E%3C/svg%3E") 100% 100% no-repeat
      background-size: 100% 100%
    .footer-logos
      margin-bottom: 2rem
      height: 45px
      +mobile
        height: 30px
        margin: 1rem 0
      img
        height: 100%
        margin-left: 1rem
</style>
