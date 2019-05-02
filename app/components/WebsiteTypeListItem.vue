<template>
  <li>
    <span class="fa-li">
      <font-awesome-icon icon="check-circle" class="check-icon" />
    </span>
    <span>{{ type }}</span>
  </li>
</template>

<script>
export default {
  props: {
    type: {
      required: true,
      type: String
    }
  }
}
</script>
