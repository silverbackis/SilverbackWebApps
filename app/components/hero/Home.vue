<template>
  <hero v-bind="$props" class="home-hero">
    <template slot="hero-svg">
      <svg class="hero-svg"
           version="1.1"
           xmlns="http://www.w3.org/2000/svg"
           xmlns:xlink="http://www.w3.org/1999/xlink"
           viewBox="-2 -2 760 1087" xml:space="preserve">
        <defs>
          <clipPath id="clip-path">
            <rect x="44%" y="-40%" width="6%" height="140%" fill="white" class="clip-rectangle top" ref="clipRectangle__top" />
          </clipPath>
        </defs>
        <path ref="svgLogo__noFace" class="path noface" d="M322.2,0C129.2,0,21.8,90.8,0,272.3c2.5,6.7,3.6,83.8,3.6,83.8l3.3,30.1l6.3,39.3l4.3,20.2l7.9,30l10.3,30.6
	l15.4,35.2l12.8,23l14.7,21.5l18.2,21.4l17.2,16l10.4,8.2l10.8,7.8c44.6,23,100,34.5,166,34.5h147.5c19.7,0,34.2,5.8,43.4,17.3
	c9.2,11.5,13.9,23.8,13.9,37.1s-4.6,25.6-13.9,37.1s-23.7,17.2-43.4,17.2H150.3c-90.2,0-136.6,50.1-138.8,150.3l-0.2,150h125.9
	c3.7,0.2,7.4,0.4,11.3,0.4h284.6C648.4,1083,756,967.7,756,737.1c0-218.5-101.8-327.8-305.4-327.8H303c-19.7,0-34.1-5.7-43.3-17.2
	c-9.3-11.5-14-23.8-14-37.1c0-13.3,4.6-25.6,14-37.1c9.2-11.5,23.7-17.2,43.3-17.2h246.4c90.2,0,136.5-50.1,138.8-150.3V145
	c0-0.3,0-48.6,0-144.7H554.7c-1.2,0-2.3-0.1-3.4-0.1H322.2" />

        <path ref="svgLogo__back" class="path logo back" d="M322.2,0C129.2,0,21.8,90.8,0,272.3c11.9,5.1,90.2,39.2,109.3,62.9c21.5-1.2,35.5,13.4,39.8,21.2
          c8.2,1.6,7,9.8,7,9.8s-3.5,22.4-10.2,28.5c4.3,7.3-1.6,10.6-1.6,10.6s-2.7,13,13.3,26.1c15.6,7.3,25.8,4.1,44.5,27.7
          c11.3,3.3,16.4,9,16.4,9s2,13,14.8,22c12.5,17.1,6.6,22.8,22.6,49.7c13.6,6.5,16.8,15.1,10.1,26.1c-4.7,4.1-29.3,54.2-67.1,49.7
          c-15.5,10.5-43.3,14.8-63.7,23.8c44.6,23,100,34.5,166,34.5h147.5c19.7,0,34.2,5.8,43.4,17.3c9.2,11.5,13.9,23.8,13.9,37.1
          c0,13.3-4.6,25.6-13.9,37.1c-9.3,11.5-23.7,17.2-43.4,17.2H150.3c-90.2,0-136.6,50.1-138.8,150.3l-0.2,150h125.9
          c3.7,0.2,7.4,0.4,11.3,0.4h284.6C648.4,1083,756,967.7,756,737.1c0-218.5-101.8-327.8-305.4-327.8l-147.6,0
          c-19.7,0-34.1-5.7-43.3-17.2c-9.3-11.5-14-23.8-14-37.1c0-13.3,4.6-25.6,14-37.1c9.2-11.5,23.7-17.2,43.3-17.2h246.4
          c90.2,0,136.5-50.1,138.8-150.3v-5.4c0-0.3,0-48.6,0-144.7H554.7c-1.2,0-2.3-0.1-3.4-0.1H322.2" clip-path="url(#clip-path)" />

        <path ref="svgLogo__top" class="path logo top" d="M322.2,0C129.2,0,21.8,90.8,0,272.3c11.9,5.1,90.2,39.2,109.3,62.9c21.5-1.2,35.5,13.4,39.8,21.2
          c8.2,1.6,7,9.8,7,9.8s-3.5,22.4-10.2,28.5c4.3,7.3-1.6,10.6-1.6,10.6s-2.7,13,13.3,26.1c15.6,7.3,25.8,4.1,44.5,27.7
          c11.3,3.3,16.4,9,16.4,9s2,13,14.8,22c12.5,17.1,6.6,22.8,22.6,49.7c13.6,6.5,16.8,15.1,10.1,26.1c-4.7,4.1-29.3,54.2-67.1,49.7
          c-15.5,10.5-43.3,14.8-63.7,23.8c44.6,23,100,34.5,166,34.5h147.5c19.7,0,34.2,5.8,43.4,17.3c9.2,11.5,13.9,23.8,13.9,37.1
          c0,13.3-4.6,25.6-13.9,37.1c-9.3,11.5-23.7,17.2-43.4,17.2H150.3c-90.2,0-136.6,50.1-138.8,150.3l-0.2,150h125.9
          c3.7,0.2,7.4,0.4,11.3,0.4h284.6C648.4,1083,756,967.7,756,737.1c0-218.5-101.8-327.8-305.4-327.8l-147.6,0
          c-19.7,0-34.1-5.7-43.3-17.2c-9.3-11.5-14-23.8-14-37.1c0-13.3,4.6-25.6,14-37.1c9.2-11.5,23.7-17.2,43.3-17.2h246.4
          c90.2,0,136.5-50.1,138.8-150.3v-5.4c0-0.3,0-48.6,0-144.7H554.7c-1.2,0-2.3-0.1-3.4-0.1H322.2" />
        </svg>
    </template>
  </hero>
</template>

<script>
import Hero from '~/components/bwstarter/Hero'
export default {
  mixins: [Hero],
  components: {
    Hero
  },
  mounted() {
    const heroSplitText = new this.$gsap.SplitText(".hero .title", {type:"words,chars"})
    const chars = heroSplitText.chars
    this.$gsap.tween.set(".hero .title", {perspective:400})

    const timeline = new this.$gsap.timeline({ repeat: -1, repeatDelay: 2 })
    timeline
      .set(this.$refs.svgLogo__top, { stroke: 'white' })
      .fromTo(
        this.$refs.svgLogo__top,
        .8,
        {
          drawSVG: "0% 10%"
        },
        {
          drawSVG: "54% 56%",
          ease: Power0.easeNone
        }
      )
      .addLabel("line2")
      .fromTo(
        this.$refs.svgLogo__top,
        .8,
        {
          drawSVG: "45% 55%"
        },
        {
          drawSVG: "98% 100%",
          ease: Power0.easeNone
        }
      )
      .addLabel("mask")
      .from(this.$refs.clipRectangle__top, 1.2, { attr: { y: '160%' }, ease: Power1.easeOut }, "mask")
      .to(this.$refs.clipRectangle__top, 1.2, { attr: { x: '-90%', width: '240%' }, ease: Power1.easeOut }, "-=.5")
      .from(
        [this.$refs.svgLogo__top, this.$refs.svgLogo__back],
        3,
        {
          morphSVG: this.$refs.svgLogo__noFace,
          ease: Elastic.easeOut
        },
        "-=.4"
      )
      .staggerFrom(
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
        "line2+=.5"
      )
  }
}
</script>

<style lang="sass">
  @import 'assets/css/vars'
  @import '~bulma/sass/utilities/mixins'
  .clip-rectangle
    transform-origin: 50% 50%
    &.top
      transform: rotate(45deg)
    &.bottom
      transform: rotate(-30deg)
  .path
    stroke-width: 4px
    fill: $teal
    stroke: transparent
    &.back
      stroke: transparent
    &.top
      fill: transparent
      stroke: $teal
    &.noface
      display: none
  .home-hero
    .hero-svg
      position: absolute
      top: -20%
      height: 150%
      left: 52%
      transform-origin: 50% 50%
      +desktop
        left: auto
        right: 115px
</style>
