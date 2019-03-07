<template>
  <hero v-bind="$props" class="how-we-work-hero">
    <template slot="hero-svg">
      <img class="hero-svg" src="~assets/images/hero/how-we-work.svg" />
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
  .how-we-work-hero
    .hero-svg
      position: absolute
      top: -10%
      height: 150%
      right: -19%
    .hero .title > span.main
      font-size: 7rem
      padding-left: 9rem
      margin-top: -2rem
</style>
