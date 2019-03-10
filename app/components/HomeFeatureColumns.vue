<template>
  <component-wrapper :className="['feature-horizontal', 'home-feature-columns']"
                     :extendClass="false"
                     :nested="nested"
  >
    <div class="container has-text-centered">
      <div class="header-icon">
        <slot name="header-icon" />
      </div>
      <h3 class="subtitle features-title" v-if="component.title" v-html="component.title" />
      <nav class="columns"
           v-for="(components, index) in this.childComponents"
           :key="index"
      >
        <feature-column-item v-for="(feature, count) in components"
                             :component="feature"
                             :key="count"
                             :svg-height="svgHeight"
                             :svg-width="svgWidth"
        />
      </nav>
      <div class="feature-buttons">
        <slot name="buttons" />
      </div>
    </div>
  </component-wrapper>
</template>

<script>
import ComponentMixin from '~/.nuxt/bwstarter/bulma/components/componentMixin'
import FeatureColumnItem from './bwstarter/FeatureColumnItem'
import CheetahAnimate from '~/components/CheetahAnimate'

export default {
  mixins: [ComponentMixin],
  components: { CheetahAnimate, FeatureColumnItem },
  props: {
    svgHeight: {
      type: Number,
      default: null
    },
    svgWidth: {
      type: Number,
      default: null
    }
  }
}
</script>

<style lang="sass">
  @import "assets/css/vars"
  .home-feature-columns
    padding: 3rem
    margin-top: 4rem
    background: $blue
    border: solid $teal
    border-width: 8px 0 0
    + .home-feature-columns
      box-shadow: inset 0 2px 0 -1px rgba($black, .45), inset 0 3px 0 -1px rgba($white, .07)
      border-width: 0 0 8px
      margin-top: 0
    .subtitle
      +subtitle
      color: $white
    .header-icon
      height: 100px

    .button
      +timeburner
      font-weight: bold
      transition: .3s border, .3s background-color, .3s color
      border-color: $teal !important
      padding: 1.5rem
      min-width: 250px
      &:hover,
      &:active
        color: $white !important
        background-color: $teal !important
</style>
