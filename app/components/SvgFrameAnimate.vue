<template>
  <svg class="svg-frame-animate" ref="svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <slot />
  </svg>
</template>

<script>
export default {
  props: {
    frameTime: {
      type: Number,
      required: true
    },
    yoyo: {
      type: Boolean,
      default: false
    }
  },
  mounted() {
    this.animate()
  },
  methods: {
    animate() {
      const getFramePaths = (group) => {
        let paths = []
        for (const child of group.children) {
          const tagName = child.tagName
          if (tagName === 'g') {
            paths.push(...getFramePaths(child))
          } else if(tagName === 'path') {
            paths.push(child)
          }
        }
        return paths
      }
      const svg = this.$refs.svg
      let pathsByFrame = []
      const svgChildren = svg.children
      for (const frameGroup of svgChildren) {
        const framePaths = getFramePaths(frameGroup)
        pathsByFrame.push(framePaths)
      }

      const firstFramePaths = pathsByFrame[0]
      this.timeline = new TimelineMax({
        paused: true,
        repeat: -1,
        yoyo: this.yoyo
      })

      // remove the first frame paths and we will tween those to all remaining frame's paths
      pathsByFrame.splice(0, 1)
      pathsByFrame.forEach((paths, frameIndex) => {
        const startTime = frameIndex*this.frameTime
        paths.forEach((path, pathIndex) => {
          this.timeline.to(
            firstFramePaths[pathIndex],
            this.frameTime,
            {
              morphSVG: path,
              ease: Power0.easeNone
            },
            startTime
          )
          path.style.display = 'none'
        })
      })
      this.timeline.play()
    }
  }
}
</script>

<style lang="sass">
  .svg-frame-animate
    height: 100%
</style>