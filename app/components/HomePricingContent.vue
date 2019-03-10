<template>
  <div class="sbwa-content">
    <content-component v-bind="$props" />
    <div class="columns is-centered">
      <div class="column is-3">
        <button class="button is-rounded is-medium is-info is-fullwidth is-outlined">MVP Pricing</button>
      </div>
      <div class="column is-3">
        <button class="button is-rounded is-medium is-info is-fullwidth">Get a Quote</button>
      </div>
    </div>
  </div>
</template>

<script>
import ContentComponent from '~/components/bwstarter/Content'
import ComponentMixin from '~/.nuxt/bwstarter/bulma/components/componentMixin'

export default {
  mixins: [ComponentMixin],
  components: {
    ContentComponent
  }
}
</script>
