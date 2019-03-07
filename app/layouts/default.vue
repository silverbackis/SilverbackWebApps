<template>
  <div class="layout">
    <div class="site-content">
      <div>
        <bulma-navbar
          v-if="structure && structure.navBar"
          :component="getEntity(structure.navBar['@id'])"
          :items-at-end="true"
          class="is-transparent is-dark"
          :style="{ backgroundColor: `rgba(33,46,99,${navOpacity})`, boxShadow: `inset 0 -8px 0px -4px rgba(75,162,161,${navOpacity})` }"
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
      this.navOpacity = Math.max((window.scrollY - 120) / 150, 0)
      console.log('scroll...', window.scrollY, this.navOpacity)
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
</style>
