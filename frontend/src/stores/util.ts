import { defineStore } from 'pinia'

export const useUtilStore = defineStore('util', {
  state: () => ({
    modal: false
  }),
  actions: {
    async showModal() {
      this.modal = true
    }
    // async getLocaleCountryCode (baseUrl) {
    //     const response = await $fetch(`${baseUrl}`, {
    //         method: 'GET',
    //         headers: {
    //         'Accept': 'application/json',
    //         'Content-Type': 'application/json'
    //         }
    //     })
    //     this.phone = response
    //   }
  }
})
