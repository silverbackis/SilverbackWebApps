<template>
  <nav
    class="navbar is-fixed-top"
    :style="{ transform: 'translateY(' + navY + 'px)' }"
  >
    <div ref="nav" class="navbar-brand">
      <slot name="logo">
        <nuxt-link
          class="navbar-item is-logo"
          to="/"
          exact
          active-class="logo-active"
        >
          <img src="~assets/images/logo.svg" alt="Silverback Web Apps" />
        </nuxt-link>
      </slot>
    </div>
  </nav>
</template>

<script>
export default {
  data: () => ({
    windowY: 0,
    lastWindowY: 0,
    yTicking: false,
    navY: 0
  }),
  mounted() {
    document.body.addEventListener('scroll', this.updateWindowY)
    window.addEventListener('scroll', this.updateWindowY)
  },
  beforeDestroy() {
    document.body.removeEventListener('scroll', this.updateWindowY)
    window.removeEventListener('scroll', this.updateWindowY)
  },
  methods: {
    updateWindowY() {
      this.windowY = Math.max(document.body.scrollTop || window.scrollY, 0)
      this.requestYTick()
    },
    requestYTick() {
      if (!this.yTicking) {
        this.yTicking = true
        requestAnimationFrame(this.updateNavY)
      }
    },
    updateNavY() {
      const diff = this.windowY - this.lastWindowY
      this.lastWindowY = this.windowY
      // iOS does not always trigger a scroll event (e.g. when bouncing)
      // so we stop ticking when we see there has been no movement
      this.yTicking = diff !== 0
      if (this.yTicking) {
        requestAnimationFrame(this.updateNavY)
      }
      this.navY = Math.min(
        Math.max(this.navY - diff, this.$el.clientHeight * -1),
        0
      )
    }
  }
}
</script>

<style lang="sass">
@import 'assets/css/_vars'
@import '~bulma/sass/utilities/mixins'
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
