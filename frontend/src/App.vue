<template>
  <v-app>
    <v-main>
      <v-container>
        <v-row align="center">
          <v-col class="d-flex" cols="12" sm="6" md="8">
            <v-select :items="items" item-text="name" item-value="value" v-model="selectedType" solo hide-details="auto"></v-select>
          </v-col>
            <v-col class="d-flex" cols="6" md="4">
            <v-btn color="primary" v-on:click="load()" :loading="loading" :disabled="selectedType == null">Создать</v-btn>
            </v-col>
        </v-row>

        <v-row>
          <v-col class="d-flex" cols="12" sm="6" md="8">
            <v-simple-table v-if="displayedData != ''">
              <template v-slot:default>
                <thead>
                  <tr>
                    <th class="text-left">ID сущности</th>
                    <th class="text-left">Наименование сущности</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in displayedData" :key="item.ID">
                  <td>{{ item.ID }}</td>
                  <td>{{ item.Name }}</td>
                  </tr>
                </tbody>
                </template>
              </v-simple-table>
            </v-col>
       </v-row>

      </v-container>
    </v-main>
    </v-app>
</template>


<script>

const axios = require('axios');

export default {
  data: function () {
    return {
      items: [{name: 'Не выбрано', value: null},{name: 'Контакты', value: 'contacts'},{name: 'Сделки', value: 'leads'},{name: 'Компании', value: 'companies'}],
      selectedType : null,
      url: 'http://localhost:81/api',
      displayedData: [],
      loading: false,
      }
  },
  methods:{
    load(){

      const self = this;
      self.loading = true;
      axios({
      method: 'post',
      url: [self.url,'/',self.selectedType].join(''),
      })
      .then(function (response) {
        response.status == 200 ? self[self.selectedType](response.data):alert(response.status);
        self.loading = false;
      })
      .catch(function (error) {
        alert(error);
        self.loading = false;
      });
    },

    contacts(data){
      this.$store.commit('addContacts', data);
      this.displayedData = this.$store.state.contacts;
    },

    leads(data){
      this.$store.commit('addLeads', data);
      this.displayedData = this.$store.state.leads;
    },

    companies(data){
      this.$store.commit('addCompanies', data);
      this.displayedData = this.$store.state.companies;
    },

  }
};
</script>

<style>
  th, .v-select{
    font-size: 0.95em!important;
  }

  .v-btn{
    text-transform: none!important;
    font-size: 0.95em!important;
  }
</style>
