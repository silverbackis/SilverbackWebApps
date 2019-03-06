<script>
import BasePage from '~/.nuxt/bwstarter/bulma/pages/_base.vue'
export default {
  extends: BasePage,
  head () {
    return Object.assign({}, this.headData, {
      titleTemplate: 'Silverback Web Apps'
    })
  }
}
</script>
