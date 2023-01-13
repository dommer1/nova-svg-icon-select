<template>
  <ShowOption :field="field" />
</template>

<script>
import ShowOption from './ShowOption';

export default {
  props: ['resourceName', 'field'],

  components: {
    ShowOption
  },
}
</script>
