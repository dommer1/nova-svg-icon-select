<template>
  <PanelItem :index="index" :field="field">
    <template v-slot:value v-if="field.value">
      <ShowOption :option="{ value: field.value }" :field="field" />
    </template>
  </PanelItem>
</template>

<script>
import ShowOption from './ShowOption';

export default {
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],

  components: {
    ShowOption
  }
}
</script>
