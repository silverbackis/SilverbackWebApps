<template>
  <div class="layout">
    <div class="site-content">
      <div>
        <bulma-navbar
          v-if="structure && structure.navBar"
          :component="getEntity(structure.navBar['@id'])"
          :items-at-end="true"
          class="is-dark"
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
  mixins: [LayoutMixin]
}
</script>


<style lang="sass">
  @import 'assets/css/_vars'
  @import '~bulma/sass/utilities/mixins'

  .layout
    padding-top: $navbar-height
    display: flex
    min-height: 100vh
    flex-direction: column
    .page
      padding-bottom: 3rem
    +desktop
      padding-top: $navbar-height-desktop
      .navbar
        height: $navbar-height-desktop
    .site-content
      flex: 1 0 auto
</style>