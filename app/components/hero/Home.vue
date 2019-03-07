<template>
  <hero v-bind="$props">
    <template slot="hero-svg">
      <img class="hero-svg" src="~assets/images/hero/home.svg" />
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
  .hero-svg
    position: absolute
    top: -20%
    height: 150%
    left: 52%
    +desktop
      left: auto
      right: 115px
</style>
