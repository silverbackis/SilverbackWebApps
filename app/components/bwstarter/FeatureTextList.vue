<script>
import FeatureTextList from '~/.nuxt/bwstarter/bulma/components/Feature/TextList/FeatureTextList'

export default {
  extends: FeatureTextList
}
</script>

<style lang="sass">
  @import 'assets/css/vars'
  .feature-list
    +timeburner
    font-weight: bold
    .subtitle
      +subtitle
    .fa-ul
      li
        margin-bottom: .5rem
        font-size: 1.1rem
        .fa-li
          margin-right: 1rem
          color: $teal
    + .sbwa-content
      border-top: 1px solid $grey-lightest
</style>
