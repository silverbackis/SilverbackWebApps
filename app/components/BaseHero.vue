<template>
  <div class="hero is-primary">
    <div class="hero-background">
      <slot name="hero-svg" />
    </div>
    <div class="hero-body">
      <div class="container">
        <div class="columns is-vcentered">
          <div class="column">
            <h1 ref="heroTitle" class="title">
              <template>
                <span class="has-text-secondary">
                  It's <span class="is-small">about</span>
                </span>
                <span class="has-text-white">time</span>
              </template>
            </h1>
            <slot name="title-end" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Back } from 'gsap'

export default {
  data() {
    return {
      heroTween: null
    }
  },
  mounted() {
    const title = this.$refs.heroTitle
    if (title) {
      const heroSplitText = new this.$gsap.SplitText(title, {
        type: 'words,chars'
      })
      const words = heroSplitText.words
      this.$gsap.tween.set(title, { perspective: 400, opacity: 1 })
      this.heroTween = new this.$gsap.timeline({ paused: true }) // eslint-disable-line new-cap
      words.forEach((word, index) => {
        this.heroTween.from(
          word,
          0.6,
          { opacity: 0, force3D: true },
          index * 0.01
        )
        this.heroTween.from(
          word,
          0.6,
          { scale: index % 2 === 0 ? 0 : 2, ease: Back.easeOut },
          index * 0.01
        )
      })
    }
    this.$root.$on('heroAnimate', this.showTitle)
  },
  beforeDestroy() {
    this.$root.$off('heroAnimate', this.showTitle)
  },
  methods: {
    showTitle() {
      if (this.heroTween !== null) {
        this.heroTween.play(0)
      }
    }
  }
}
</script>

<style lang="sass">
@import 'assets/css/_vars'
@import '~bulma/sass/utilities/mixins'
@function rgb-format($color)
  @return unquote("rgb(#{red($color)}, #{green($color)}, #{blue($color)})")

.hero
  position: relative
  overflow: visible
  padding-top: $navbar-height
  +desktop
    padding-top: $navbar-height-desktop
  .hero-background
    position: absolute
    top: 0
    left: 0
    width: 100%
    height: 100%
    overflow: hidden
    &:after
      +angle-white-bottom
  .container
    margin-bottom: 70px
  .title
    opacity: 0
    > span
      display: block
      &.has-text-secondary
        font-size: 5.5rem
        color: $aqua
        .is-small
          font-size: 3rem
      &.has-text-white
        padding-left: 2.8rem
        font-size: 8rem
        margin-top: -1rem
        letter-spacing: .2rem
</style>
