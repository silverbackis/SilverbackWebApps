<template>
  <hero v-bind="$props" class="why-choose-us-hero">
    <template slot="hero-svg">
      <img class="hero-svg" src="~assets/images/hero/why-choose-us.svg" />
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
  .why-choose-us-hero
    .hero-svg
      position: absolute
      top: -20%
      height: 190%
      right: -11%
    .hero .title
      > span
        &.intro
          font-size: 4.5rem
        &.main
          font-size: 5rem
          margin-top: 0
          padding-left: 3.5rem
</style>
