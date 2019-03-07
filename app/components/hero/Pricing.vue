<template>
  <hero v-bind="$props" class="pricing-hero">
    <template slot="hero-svg">
      <img class="hero-svg" src="~assets/images/hero/pricing.svg" />
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
  .pricing-hero
    .hero-svg
      position: absolute
      bottom: 10%
      width: 60%
      right: -11%
    .hero .title
      > span
        &.intro
          font-size: 3.5rem
        &.main
          font-size: 6rem
          padding-left: 5.5rem
          margin-top: -.5rem
</style>
