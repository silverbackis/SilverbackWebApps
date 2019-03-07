<script>
import Hero from '~/.nuxt/bwstarter/bulma/components/Hero/Hero'
export default {
  extends: Hero
}
</script>

<style lang="sass">
  @import 'assets/css/_vars'
  @import '~bulma/sass/utilities/mixins'
  .hero
    padding-top: $navbar-height
    +desktop
      padding-top: $navbar-height-desktop
</style>
