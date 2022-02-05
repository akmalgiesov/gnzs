import Vue from 'vue'
import App from './App.vue'
import axios from 'axios'
import store from './store'
import vuetify from './plugins/vuetify'

Vue.config.productionTip = false

new Vue({
  vuetify,
  axios,
  store,
  render: h => h(App)
}).$mount('#app')
