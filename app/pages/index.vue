<template>
  <section class="page index">
    <home-hero />
    <pwa-content />
    <website-types />
    <website-planning />
    <expert-advice />
  </section>
</template>

<script>
import HomeHero from '~/components/HomeHero'
import PwaContent from '~/components/PwaContent'
import WebsiteTypes from '~/components/WebsiteTypes'
import WebsitePlanning from '~/components/WebsitePlanning'
import ExpertAdvice from '~/components/ExpertAdvice'
export default {
  components: {
    HomeHero,
    PwaContent,
    WebsiteTypes,
    WebsitePlanning,
    ExpertAdvice
  }
}
</script>

<style lang="sass">
@import '~assets/css/_vars'
@import '~bulma/sass/utilities/mixins'
.button-icon
  display: block
  width: 30px
  height: 100%
  background: 50% 60% no-repeat
  background-size: auto 85%
  margin-right: .5em
.button.is-rounded
  box-shadow: 0 4px 7px 0 $grey
  padding-left: 2em
  padding-right: 2em
  margin-top: 1rem
  font-family: $family-time-burner
  font-weight: bold
  +tablet
    font-size: 1.25rem
.content
  display: inline-block
  padding: 0 2rem
  max-width: 850px
  width: 100%
  text-align: left
  +mobile
    padding: 0
  .title
    font-size: 2.4rem
    .has-text-secondary
      display: inline-block
    +mobile
      font-size: 1.6rem
</style>
