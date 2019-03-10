<template>
  <div class="layout">
    <div class="site-content">
      <div>
        <bulma-navbar
          v-if="structure && structure.navBar"
          :component="getEntity(structure.navBar['@id'])"
          :items-at-end="true"
          class="is-transparent is-dark"
          :style="{
            backgroundColor: `rgba(33,46,99,${navOpacity})`
          }"
        >
          <template slot="logo">
            <nuxt-link
              class="navbar-item is-logo"
              to="/"
              exact
              active-class="logo-active">
              <img src="~assets/images/logo.svg" alt="Silverback Web Apps">
            </nuxt-link>
          </template>
          <template slot="navbar-end" v-if="!!token">
            <a class="button is-small is-danger is-outlined is-logout is-radiusless" href="#" @click.prevent="$bwstarter.logout">Logout</a>
          </template>
        </bulma-navbar>
      </div>
      <nuxt/>
    </div>
    <footer class="footer">
      <div class="container">
        <nav class="columns">
          <div class="column is-4">
            <ul>
              <li><app-link to="/">Home</app-link></li>
              <li><app-link to="/how-we-work">How we work</app-link></li>
              <li><app-link to="/why-choose-silverback">Why choose us?</app-link></li>
              <li><app-link to="/pricing">Pricing</app-link></li>
            </ul>
          </div>
          <div class="column is-4">
            <ul>
              <li><app-link to="/contact">Contact</app-link></li>
              <li><app-link to="/portfolio">Portfolio</app-link></li>
              <li><app-link to="/our-platform">Our platform</app-link></li>
              <li><app-link to="/services">Additional services</app-link></li>
            </ul>
          </div>
          <div class="column is-4">
            <ul>
              <li><a href="tel:+442081332939">+44 (0)208 133 2939</a></li>
              <li><a href="mailto:info@silverbackwebapps.com">info@silverbackwebapps.com</a></li>
              <li class="logos">
                <img src="~assets/images/icon-footer-made-in-britain.svg" alt="Made in Britain" />
                <img src="~assets/images/icon-footer-fsb.svg" alt="FSB Logo" />
              </li>
            </ul>
          </div>
        </nav>
        <div class="columns">
          <div class="column is-12 help">
            <app-link to="/terms-privacy">Terms & Privacy</app-link> | &copy; {{ new Date().getFullYear() }} Silverback Internet Services Limited VAT: GB 177 0995 64 Company Number: 07120829
          </div>
        </div>
      </div>
    </footer>
    <notifications/>
    <admin-bar v-if="$bwstarter.isAdmin"/>
  </div>
</template>

<script>
import LayoutMixin from '~/.nuxt/bwstarter/components/layoutMixin'
import Notifications from '~/.nuxt/bwstarter/bulma/components/Notifications/Notifications'
export default {
  components: {
    BulmaNavbar: () =>
      import('~/.nuxt/bwstarter/bulma/components/Nav/Navbar/Navbar.vue'),
    AppLink: () => import('~/.nuxt/bwstarter/components/Utils/AppLink'),
    AdminBar: () => import('~/.nuxt/bwstarter/bulma/components/Admin/AdminBar'),
    Notifications
  },
  mixins: [LayoutMixin],
  data() {
    return {
      navOpacity: 0
    }
  },
  mounted() {
    window.addEventListener('scroll', this.updateNavOpacity)
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.updateNavOpacity)
  },
  methods: {
    updateNavOpacity() {
      this.navOpacity = Math.max(Math.min((window.scrollY - 120) / 150, .97), 0)
    }
  }
}
</script>


<style lang="sass">
  @import 'assets/css/_vars'
  @import '~bulma/sass/utilities/mixins'

  .layout
    // padding-top: $navbar-height
    display: flex
    min-height: 100vh
    flex-direction: column
    .page
      padding-bottom: 3rem
    +desktop
      // padding-top: $navbar-height-desktop
      .navbar
        height: $navbar-height-desktop
    .site-content
      flex: 1 0 auto

  .navbar
    .navbar-item,
    .navbar-link
      +timeburner
      font-weight: 700
      font-size: 1.1rem
      padding: $navbar-padding-vertical .7rem
      transition: opacity .3s
      &:not(:hover):not(.is-active):not(.is-logo)
        opacity: .8
      img
        +desktop
          max-height: $navbar-item-img-max-height-desktop
  .footer
    +timeburner
    color: $white
    border-top: 12px solid $teal
    margin-top: 3rem
    font-weight: bold
    font-size: 1.1rem
    .container
      max-width: 900px
    a
      color: inherit
      &:hover
        text-decoration: underline
    .help
      text-align: center
      color: rgb(83, 97, 160)
      margin-top: 4rem
    .logos
      margin-top: .5rem
</style>
