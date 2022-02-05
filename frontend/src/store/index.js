import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state:{
    contacts:[],
    leads:[],
    companies:[],
  },
  mutations:{
    addContacts(state,contacts){
      state.contacts.push(contacts);
    },
    addLeads(state,leads){
      state.leads.push(leads);
    },
    addCompanies(state,companies){
      state.companies.push(companies);
    }
  }
})
