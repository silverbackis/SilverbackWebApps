<template>
  <home-feature-columns v-bind="$props" :svg-height="120">
    <template slot="header-icon">
      <palm-animate />
    </template>
    <template slot="buttons">
      <app-link class="button is-outlined is-rounded is-white is-medium" to="/why-choose-silverback">Why choose us?</app-link>
    </template>
  </home-feature-columns>
</template>

<script>
import HomeFeatureColumns from '~/components/HomeFeatureColumns'
import PalmAnimate from '~/components/PalmAnimate'
import ComponentMixin from '~/.nuxt/bwstarter/bulma/components/componentMixin'

export default {
  mixins: [ComponentMixin],
  components: { PalmAnimate, HomeFeatureColumns }
}
</script>
