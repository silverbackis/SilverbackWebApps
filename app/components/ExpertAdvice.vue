<template>
  <section class="expert-advice-content">
    <div class="section">
      <div class="container has-text-centered">
        <div class="content">
          <i class="expert-advice-header"></i>
          <h3 class="title has-text-primary">
            get free <span class="has-text-secondary">expert advice</span>
          </h3>
          <p>
            Whether your idea is in its infancy or you have a developed concept
            we’d love to chat about it. We can brainstorm ideas and give our
            expert advice free of charge to give you a feel for how we work and
            what we can offer.
          </p>
          <div>
            <a href="tel:+4402081332939" class="button is-info is-rounded">
              <span class="icon is-small">
                <i class="button-icon is-phone"></i>
              </span>
              <span class="is-hidden-tablet">
                call us
              </span>
              <span class="is-hidden-mobile">+44 (0)208 133 2939</span>
            </a>
          </div>
          <div>
            <a
              href="mailto:contact@silverbackwebapps.com"
              class="button is-info is-rounded"
            >
              <span class="icon is-small">
                <i class="button-icon is-email"></i>
              </span>
              <span class="is-hidden-tablet">
                email us
              </span>
              <span class="is-hidden-mobile">
                contact@silverbackwebapps.com
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="sass">
@import '~bulma/sass/utilities/mixins'
.button-icon.is-phone
  background-image: url('~assets/images/icon-phone.svg')
.button-icon.is-email
  background-image: url('~assets/images/icon-email.svg')
  background-size: 100% auto
.expert-advice-header
  display: block
  height: 135px
  width: 100%
  background: url('~assets/images/icon-contact.svg') 0 50% no-repeat
  background-size: auto 100%
  +mobile
    height: 115px
</style>
