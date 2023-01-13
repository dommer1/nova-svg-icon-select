<template>
  <div class="flex items-center py-1">
    <svg aria-hidden="true" focusable="false" class="fill-current w-8 h-8 mr-4"
      :class="{
        'text-red-600': field.color === null,
        color: field.color !== null,
      }"
    >
      <use :href="field.svgPath + '#' + item.value" />
    </svg>
    {{ item.label }}
  </div>
</template>

<script>
export default {
  props: {
    option: {},
    field: {}
  },
  computed: {
    item() {
      return this.field.options.find(option => option.value === (this.option.value || this.field.value))
    }
  }
}
</script>