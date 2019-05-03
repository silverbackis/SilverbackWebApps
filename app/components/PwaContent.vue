<template>
  <section class="pwa-content section">
    <div class="container has-text-centered">
      <div class="content">
        <h3>PWA (Progressive Web Apps)</h3>
        <p>
          We specialise in creating the next generation of websites known as
          Progressive Web Apps. PWAs behave like mobile apps with instant
          loading, silky smooth animation and an immersive user experience
          allowing users to engage effortlessly with your site.
        </p>
      </div>
    </div>
  </section>
</template>

<style lang="sass" scoped>
@import '~assets/css/_vars'
@import '~bulma/sass/utilities/mixins'
.section
  position: relative
  overflow: hidden
  &:after
    +angle-grey-bottom
  .content
    margin-bottom: 6vw
h3
  display: block
  height: 50px
  background: url('~assets/images/icon-pwa.svg') 0 0 no-repeat
  background-size: auto 100%
  text-indent: -1000px
  overflow: hidden
  margin-bottom: 1em
  +mobile
    height: 35px
</style>
