<template>
  <div class="hero is-primary">
    <div class="hero-body">
      <slot></slot>
    </div>
  </div>
</template>

<style lang="sass">
@import 'assets/css/_vars'
@import '~bulma/sass/utilities/mixins'
@function rgb-format($color)
  @return unquote("rgb(#{red($color)}, #{green($color)}, #{blue($color)})")

.hero
  position: relative
  min-height: 440px
  height: 45vh
  max-height: 1000px
  overflow: hidden
  +tablet
    min-height: 540px
    height: 75vh
  .hero-body
    padding: 0
    height: 100%
    &:after
      left: 0
      +angle-white-bottom
</style>
