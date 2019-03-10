<template>
  <home-feature-columns v-bind="$props">
    <template slot="header-icon">
      <cheetah-animate />
    </template>
    <template slot="buttons">
      <app-link class="button is-outlined is-rounded is-white is-medium" to="/how-we-work">How we work</app-link>
    </template>
  </home-feature-columns>
</template>

<script>
import HomeFeatureColumns from '~/components/HomeFeatureColumns'
import CheetahAnimate from '~/components/CheetahAnimate'
import ComponentMixin from '~/.nuxt/bwstarter/bulma/components/componentMixin'

export default {
  mixins: [ComponentMixin],
  components: { CheetahAnimate, HomeFeatureColumns }
}
</script>
