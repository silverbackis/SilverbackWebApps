<template>
  <section class="website-planning-content">
    <div class="section">
      <div class="container has-text-centered">
        <div class="content">
          <i class="website-planning-header"></i>
          <h3 class="title has-text-primary">
            let's create
            <span class="has-text-secondary">something beautiful</span>
          </h3>
          <p>
            Our planning experts can work closely with you taking into account
            all your requirements to develop an amazing web app you can be proud
            of. Our creative designers will come up with ideas to make your site
            stand out from the crowd and our experienced coders will implement
            features to give your site that wow factor.
          </p>

          <p>
            <b>
              We are offering 30% discount for starter web apps (was £899, now
              £629) for a limited time only. Let us know a little bit about what
              you want, and we will get back to you with ideas for features and
              a proposal as soon as possible.
            </b>
          </p>

          <div>
            <button class="button is-info is-rounded" @click="showChat">
              <span class="icon is-small">
                <i class="button-icon is-chat"></i>
              </span>
              <span>Tell us your needs</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  methods: {
    showChat() {
      window.Intercom('showNewMessage')
    }
  }
}
</script>

<style lang="sass">
@import '~bulma/sass/utilities/mixins'
.button-icon.is-chat
  background-image: url('~assets/images/icon-chat.svg')

.website-planning-header
  display: block
  height: 200px
  width: 100%
  background: url('~assets/images/image-tree-bird.svg') 0 50% no-repeat
  background-size: auto 100%
  +mobile
    height: 150px
</style>
