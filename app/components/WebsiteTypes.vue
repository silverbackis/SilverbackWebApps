<template>
  <section class="website-types-content">
    <i class="portfolio-header"></i>
    <div class="section">
      <div class="container has-text-centered">
        <div class="content">
          <h3 class="title has-text-primary">
            developed <span class="has-text-secondary">for you...</span>
          </h3>
          <p>
            Our high-quality web apps are designed to give small and
            medium-sized organisations access to the latest technology without
            the usual expense. Whatever your industry, we will find out what you
            need and develop a strategy to help you get the most out of your
            project.
          </p>
          <div class="columns is-mobile is-gapless is-centered">
            <div class="column is-narrow-mobile is-12-tablet">
              <div
                class="columns features has-text-left is-multiline is-gapless"
              >
                <div class="column is-6-tablet is-4-desktop">
                  <ul class="fa-ul">
                    <website-type-list-item
                      v-for="type of websiteTypes.slice(0, 6)"
                      :key="type"
                      :type="type"
                    />
                  </ul>
                </div>
                <div class="column is-6-tablet is-4-desktop">
                  <ul class="fa-ul">
                    <website-type-list-item
                      v-for="type of websiteTypes.slice(6, 12)"
                      :key="type"
                      :type="type"
                    />
                  </ul>
                </div>
                <div class="column is-12-tablet is-4-desktop">
                  <div class="columns is-multiline is-gapless">
                    <div class="column is-6-tablet is-12-desktop">
                      <ul class="fa-ul">
                        <website-type-list-item
                          v-for="type of websiteTypes.slice(12, 15)"
                          :key="type"
                          :type="type"
                        />
                      </ul>
                    </div>
                    <div class="column is-6-tablet is-12-desktop">
                      <ul class="fa-ul">
                        <website-type-list-item
                          v-for="type of websiteTypes.slice(15, 18)"
                          :key="type"
                          :type="type"
                        />
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import WebsiteTypeListItem from '~/components/WebsiteTypeListItem'
export default {
  components: { WebsiteTypeListItem },
  data: () => ({
    websiteTypes: [
      'Writers',
      'Restaurants',
      'Tradesmen',
      'Cleaners',
      'Beauty Therapists',
      'Mechanics',
      'Self-employed',
      'Artists',
      'Photographers',
      'Tutors',
      'Consultants',
      'Agents',
      'Pet Groomers',
      'Charities',
      'Crafts',
      'Personal Trainers',
      'Financial Services',
      '+ Many More'
    ]
  })
}
</script>

<style lang="sass">
@import '~assets/css/_vars'
@import '~bulma/sass/utilities/mixins'

.website-types-content
  position: relative
  background: $grey-lightest
  padding-top: 4rem
  &:after
    +angle-white-bottom
  .section
    padding-top: 1rem
  .portfolio-header
    display: block
    height: 390px
    width: 100%
    background: url('~assets/images/image-portfolio.png') 50% 50% no-repeat
    background-size: auto 100%
    +mobile
      height: 320px
  .container
    margin: 0 auto 3vw
  .features
    margin-top: 2.5rem
    .fa-ul
      list-style: none
      margin-top: 0
    li
      margin-bottom: .5rem
      font-size: 1.1rem
      +mobile
        font-size: 1rem
      .fa-li
        margin-right: 1rem
        color: $aqua
    .column:last-child .column:last-child li:last-child span:last-child
      font-size: .9rem
</style>
