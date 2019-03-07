<template>
  <hero v-bind="$props" class="contact-hero">
    <template slot="hero-svg">
      <img class="hero-svg" src="~assets/images/hero/contact.svg" />
    </template>
  </hero>
</template>

<script>
import Hero from '~/components/bwstarter/Hero'
export default {
  mixins: [Hero],
  components: {
    Hero
  }
}
</script>

<style lang="sass">
  @import '~bulma/sass/utilities/mixins'
  .contact-hero
    .hero-svg
      position: absolute
      bottom: 15%
      width: 70%
      right: -25%
    .hero .title
      > span
        &.intro
          font-size: 4.5rem
        &.main
          font-size: 6.5rem
          margin-top: -1.5rem
          padding-left: 3.5rem
</style>
