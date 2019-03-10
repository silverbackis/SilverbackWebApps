<template>
  <svg width="283px" height="177px" viewBox="0 0 283 177" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>
      <polygon id="path-1" points="26.733408 41.9757959 12.4395604 177 283 177 267.763237 24.8421053"></polygon>
      <clipPath id="mainClip">
        <polygon id="path-3" points="13.4723621 18.7071929 0 166.131579 255.010989 166.131579 240.649902 0"></polygon>
      </clipPath>
    </defs>
    <g id="frame-left" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <mask id="mask-2" fill="white">
        <use xlink:href="#path-1"></use>
      </mask>
      <use id="Mask" fill="#48A2A2" transform="translate(147.719780, 100.921053) scale(-1, 1) translate(-147.719780, -100.921053) " xlink:href="#path-1"></use>
      <mask id="mask-4" fill="white">
        <use xlink:href="#path-3"></use>
      </mask>
      <use id="Mask" fill="#FFFFFF" xlink:href="#path-3"></use>
      <image class="svg-feature-image" :xlink:href="imageSrc" clip-path="url(#mainClip)" x="0" :y="85 - (svgSize.height/2)" :width="svgSize.width" :height="svgSize.height" />
    </g>
  </svg>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  props: {
    imageData: Object,
    svgWidth: {
      type: Number,
      default: 270
    },
    svgHeight: {
      type: Number,
      default: 175
    }
  },
  computed: {
    ...mapGetters({ getApiUrl: 'bwstarter/getApiUrl' }),
    imageSrc() {
      return this.getApiUrl(this.imageData.publicPath)
    },
    svgSize() {
      return {
        width: this.svgWidth || 270,
        height: this.svgHeight || 175
      }
    }
  }
}
</script>
