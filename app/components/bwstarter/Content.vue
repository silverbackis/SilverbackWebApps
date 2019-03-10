<template>
  <content-component class="sbwa-content" v-bind="$props" />
</template>

<script>
import ComponentMixin from '~/.nuxt/bwstarter/bulma/components/componentMixin'
import ContentComponent from '~/.nuxt/bwstarter/bulma/components/Content/Content'

export default {
  mixins: [ComponentMixin],
  components: {
    ContentComponent
  }
}
</script>

<style lang="sass">
  @import "assets/css/vars"
  .sbwa-content
    text-align: center
    &.is-feature
      font-family: $family-time-burner
      font-size: 1.25rem
      .container
        max-width: 620px
    &.has-arrow
      position: relative
      padding-bottom: 62px
      &:after
        content: ''
        position: absolute
        bottom: 10px
        width: 100px
        height: 22px
        background: url('~assets/images/arrow-down.svg') 50% 50% no-repeat
        left: 50%
        transform: translateX(-50%)
    .subtitle
      +subtitle
</style>
