<template>
  <base-hero class="home-hero">
    <section class="section home-hero-section">
      <div class="container has-text-centered">
        <div class="content">
          <div class="columns is-vcentered home-hero-columns is-mobile">
            <div class="column is-narrow home-hero-column">
              <h1 ref="heroTitle" class="title">
                <span class="has-text-secondary">
                  It's <span class="is-small">about</span>
                </span>
                <span class="has-text-white">time</span>
              </h1>

              <svg
                class="hero-svg"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="-2 -2 795.6 1116.6"
                xml:space="preserve"
              >
                <defs>
                  <clipPath id="clip-path">
                    <rect
                      ref="clipRectangle__top"
                      x="50%"
                      y="-40%"
                      width="0%"
                      height="160%"
                      fill="white"
                      class="clip-rectangle top"
                      style="display: none;"
                    />
                  </clipPath>
                </defs>
                <path
                  ref="svgLogo__noFace"
                  class="path noface"
                  d="M341,14.5c-193,0-300.4,90.8-322.2,272.3c-2.5,23.1-4.4,43.6-4.8,71.2c-0.2,12.3-0.4,16.4-0.1,23
          c-0.1,18.3,1.2,33.5,2.1,45.1c0.8,10,2.3,21.1,3.4,28.8c1.2,8,2.5,15,3.7,21c1.6,8.2,4.4,19.1,8.3,32.8c5,17.6,14.9,40.5,23.1,54.9
          c7.3,14.1,14.7,24.5,24.8,35.8c5.4,6.1,13.4,15.2,23.3,23.4c6,5.2,11.5,9.4,16.1,12.6c6.1,4.3,11.7,7.8,15.1,9.8
          c3.3,2,6.3,3.7,11.1,6.2c1.5,0.8-3-1.6,6.1,3.1c44.7,22.9,103,34.1,169,34.1h147.5c19.7,0,34.2,5.8,43.4,17.3
          c9.2,11.5,13.9,23.8,13.9,37.1s-4.6,25.6-13.9,37.1s-23.7,17.2-43.4,17.2H169.1c-90.2,0-136.6,50.1-138.8,150.3l-0.2,150H156
          c3.7,0.2,7.4,0.4,11.3,0.4h284.6c215.3-0.3,322.9-115.6,322.9-346.2c0-218.5-101.8-327.8-305.4-327.8H321.8
          c-19.7,0-34.1-5.7-43.3-17.2c-9.3-11.5-14-23.8-14-37.1c0-13.3,4.6-25.6,14-37.1c9.2-11.5,23.7-17.2,43.3-17.2h246.4
          c90.2,0,136.5-50.1,138.8-150.3v-5.4c0-0.3,0-48.6,0-144.7H573.5c-1.2,0-2.3-0.1-3.4-0.1H341"
                />

                <path
                  ref="svgLogo__back"
                  class="path logo back"
                  d="M341,14.5c-193,0-300.4,90.8-322.2,272.3c11.9,5.1,90.2,39.2,109.3,62.9c21.5-1.2,35.5,13.4,39.8,21.2
          c8.2,1.6,7,9.8,7,9.8s-3.5,22.4-10.2,28.5c4.3,7.3-1.6,10.6-1.6,10.6s-2.7,13,13.3,26.1c15.6,7.3,25.8,4.1,44.5,27.7
          c11.3,3.3,16.4,9,16.4,9s2,13,14.8,22c12.5,17.1,6.6,22.8,22.6,49.7c13.6,6.5,16.8,15.1,10.1,26.1c-4.7,4.1-29.3,54.2-67.1,49.7
          c-15.5,10.5-43.3,14.8-63.7,23.8c44.6,23,100,34.5,166,34.5h147.5c19.7,0,34.2,5.8,43.4,17.3c9.2,11.5,13.9,23.8,13.9,37.1
          s-4.6,25.6-13.9,37.1s-23.7,17.2-43.4,17.2H169.1c-90.2,0-136.6,50.1-138.8,150.3l-0.2,150H156c3.7,0.2,7.4,0.4,11.3,0.4h284.6
          c215.3-0.3,322.9-115.6,322.9-346.2c0-218.5-101.8-327.8-305.4-327.8H321.8c-19.7,0-34.1-5.7-43.3-17.2c-9.3-11.5-14-23.8-14-37.1
          c0-13.3,4.6-25.6,14-37.1c9.2-11.5,23.7-17.2,43.3-17.2h246.4c90.2,0,136.5-50.1,138.8-150.3v-5.4c0-0.3,0-48.6,0-144.7H573.5
          c-1.2,0-2.3-0.1-3.4-0.1H341"
                  clip-path="url(#clip-path)"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>
  </base-hero>
</template>

<script>
import { Power1, Elastic, Back } from 'gsap'
import BaseHero from './BaseHero'

export default {
  components: { BaseHero },
  data: () => ({
    heroTween: null
  }),
  mounted() {
    // TEXT
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
    // SVG
    const timeline = new this.$gsap.timeline({ paused: true, delay: 0.6 }) // eslint-disable-line new-cap
    timeline
      .addLabel('mask')
      .set(this.$refs.clipRectangle__top, { display: 'block' }, 'mask')
      .to(
        this.$refs.clipRectangle__top,
        1.2,
        { attr: { x: '-90%', width: '240%' }, ease: Power1.easeOut },
        'mask'
      )
      .add(() => {
        this.$root.$emit('heroAnimate')
      }, '-=1')
      .from(
        [this.$refs.svgLogo__top, this.$refs.svgLogo__back],
        3,
        {
          morphSVG: this.$refs.svgLogo__noFace,
          ease: Elastic.easeOut
        },
        '-=.9'
      )
    this.$nextTick(() => {
      timeline.play()
    })
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
@import 'assets/css/vars'
@import '~bulma/sass/utilities/mixins'

.home-hero
  .home-hero-section
    padding-top: 0
    padding-bottom: 0
    height: 100%
    .container
      height: 100%
      .content
        height: 100%
        .home-hero-columns
          height: 100%
          .home-hero-column
            height: 100%
            position: relative

  .hero-svg
    position: absolute
    top: 10%
    height: 100%
    transform: translateX(-25%)
    left: 100%
    +tablet
      top: -17%
      height: 147%
      transform: translateX(-20%)
    .clip-rectangle
      transform-origin: 50% 50%
      &.top
        transform: rotate(45deg)
      &.bottom
        transform: rotate(-30deg)
    .path
      stroke-width: 4px
      fill: $aqua
      stroke: transparent
      &.back
        stroke: transparent
      &.top
        fill: transparent
        stroke: transparent
      &.noface
        display: none
  .title
    position: relative
    display: inline-block
    opacity: 0
    margin: 0
    top: 50%
    transform: translateY(-40%)
    +tablet
      transform: translateY(-60%)
    //+desktop
    //  transform: translateY(5%)
    > span
      display: block
      &.has-text-secondary
        font-size: 5.5rem
        color: $aqua
        .is-small
          font-size: 2.5rem
        +mobile
          font-size: 2.75rem
          .is-small
            font-size: 1.5rem
      &.has-text-white
        padding-left: 2.8rem
        font-size: 8.5rem
        margin-top: -1rem
        letter-spacing: .2rem
        +mobile
          font-size: 4rem
</style>
