import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nova-svg-icon-select', IndexField)
  app.component('detail-nova-svg-icon-select', DetailField)
  app.component('form-nova-svg-icon-select', FormField)
})
