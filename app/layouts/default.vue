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
    document.body.addEventListener('scroll', this.updateNavOpacity)
    window.addEventListener('scroll', this.updateNavOpacity)
    window.Intercom('boot', {
      app_id: 'zqlbryjc'
    })
  },
  beforeDestroy() {
    document.body.removeEventListener('scroll', this.updateNavOpacity)
    window.removeEventListener('scroll', this.updateNavOpacity)
  },
  methods: {
    updateNavOpacity() {
      this.navOpacity = Math.max(
        Math.min(
          ((document.body.scrollTop || window.scrollY) - 120) / 150,
          0.97
        ),
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
    text-align: left
    line-height: 1.1rem
    padding: 40px 85px 1rem 15px
    +mobile
      .help
        font-size: .65rem
    &:before
      +angle-white-bottom
      top: -1px
      bottom: auto
      left: 0
      width: 100%
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' height='10000' width='10000'%3E%3Cpolygon points='10000,10000 -400,0 10000,0' stroke='white' fill='white' /%3E%3C/svg%3E")
    .footer-logos
      margin-bottom: 1em
      height: 45px
      +mobile
        height: 30px
        margin: 1rem 0
      img
        height: 100%
        margin-right: 1rem
</style>
