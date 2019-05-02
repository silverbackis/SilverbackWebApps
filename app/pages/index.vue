<template>
  <section class="page index">
    <hero />
    <pwa-content />
    <website-types />
  </section>
</template>

<script>
import Hero from '~/components/Hero'
import PwaContent from '~/components/PwaContent'
import WebsiteTypes from '~/components/WebsiteTypes'
export default {
  components: { Hero, PwaContent, WebsiteTypes }
}
</script>

<style lang="sass">
@import '~bulma/sass/utilities/mixins'

.content
  display: inline-block
  padding: 0 2rem
  max-width: 850px
  width: 100%
  text-align: left
  margin-bottom: 6vw
  .title
    font-size: 2.4rem
    +mobile
      font-size: 2rem
</style>
