<template>
  <div v-if="component">
    <component-wrapper :className="className"
                       :extendClass="false"
                       :nested="nested"
    >
      <div class="hero-background">
        <slot name="hero-svg" />
        <div class="bottom-overlay"></div>
      </div>
      <div class="hero-body">
        <div class="container">
          <div class="columns is-vcentered">
            <div class="column">
              <h1 class="title" ref="heroTitle">
                <template v-if="$bwstarter.isAdmin">
                  <admin-text-input :model="realComponentData.title"
                                    :componentId="endpoint"
                                    componentField="title"
                                    placeholder="Enter page title here"
                  />
                  <admin-text-input :model="realComponentData.subtitle"
                                    :componentId="endpoint"
                                    componentField="subtitle"
                                    placeholder="Enter optional subtitle here"
                  />
                </template>
                <template v-else>
                  <span class="has-text-secondary" v-html="realComponentData.title" />
                  <span class="has-text-white">{{ realComponentData.subtitle }}</span>
                </template>
              </h1>
              <slot name="title-end" />
            </div>
          </div>
        </div>
      </div>
    </component-wrapper>
  </div>
</template>

<script>
import Hero from '~/.nuxt/bwstarter/bulma/components/Hero/Hero'

export default {
  mixins: [ Hero ],
  data() {
    return {
      heroTween: null
    }
  },
  mounted() {
    const title = this.$refs.heroTitle
    if (title) {
      const heroSplitText = new this.$gsap.SplitText(title, {type:"words,chars"})
      const chars = heroSplitText.chars
      this.$gsap.tween.set(title, { perspective:400, opacity: 1 })
      this.heroTween = new this.$gsap.timeline({paused: true})
      this.heroTween.staggerFrom(
        chars,
        0.7,
        {
          opacity:0,
          scale:0,
          y: 80,
          rotationX: 180,
          transformOrigin: "0% 50% -50",
          ease: Back.easeOut
        },
        0.04,
        "-=2"
      )
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
      .bottom-overlay
        position: absolute
        width: 100%
        height: 100%
        top: 0
        left: 0
        &:after
          content: ''
          position: absolute
          bottom: 0
          left: 50%
          width: 450vw
          height: 450vw
          border: 8px solid $teal
          box-shadow: 0 0 0 10000px $white
          border-radius: 50%
          transform: translateX(-50%)
    .container
      margin-bottom: 70px
    .title
      opacity: 0
      > span
        display: block
        &.has-text-secondary
          font-size: 5.5rem
          color: $teal
          .is-small
            font-size: 3rem
        &.has-text-white
          padding-left: 2.8rem
          font-size: 8rem
          margin-top: -1rem
          letter-spacing: .2rem
</style>
