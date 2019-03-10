<template>
  <component :is="dynamicComponent"
             :to="toRoute"
             :class="className"
             class="sbwa-feature"
  >
    <div v-if="component.filePath">
      <feature-frame-left :image-data="getImageData()"
                          :svg-height="svgHeight"
                          :svg-width="svgWidth" />
    </div>
    <h4 class="title is-4">{{ injectDynamicData(component.title) }}</h4>
    <h5 class="subtitle is-size-6-touch">
      <admin-text-input v-if="$bwstarter.isAdmin"
                        :model="realComponentData.description"
                        :componentId="endpoint"
                        componentField="description"
                        placeholder="Enter feature description here"
                        class="input"
      />
      <template v-else>{{ realComponentData.description }}</template>
    </h5>
  </component>
</template>

<script>
import FeatureColumnItem from '~/.nuxt/bwstarter/bulma/components/Feature/Columns/FeatureColumnItem'
import FeatureFrameLeft from '~/components/FeatureFrameLeft'
export default {
  components: { FeatureFrameLeft },
  mixins: [FeatureColumnItem],
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
  @import 'assets/css/vars'
  .sbwa-feature
    .title
      color: $white
      font-size: 1.1rem
      width: 65%
      display: inline-block
      margin-top: 1rem
</style>
