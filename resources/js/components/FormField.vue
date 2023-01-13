<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <v-select
          :id="field.attribute"
          :options="options"
          v-model="value"
          :class="errorClasses"
          placeholder="Select icon"
      >
        <template v-slot:option="option">
          <ShowOption :option="option" :field="field" />
        </template>
        <template v-slot:selected-option="option">
          <ShowOption :option="option" :field="field" />
        </template>
      </v-select>
    </template>
  </DefaultField>
</template>

<script>
import 'vue-select/dist/vue-select.css';
import vSelect from 'vue-select'
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import ShowOption from './ShowOption'

export default {
  mixins: [FormField, HandlesValidationErrors],

  components: {
    vSelect,
    ShowOption
  },

  props: ['resourceName', 'resourceId', 'field'],

  data() {
    return {
      options: [],
      svgPath: null,
      color: null
    }
  },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || ''
      this.options = this.field.options || []
      this.svgPath = this.field.svgPath
      this.color = this.field.color
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value.value || '')
    },
  },
}
</script>
