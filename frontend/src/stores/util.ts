import { defineStore } from 'pinia'

export const useUtilStore = defineStore('util', {
  state: () => ({
    modal: false,
    weather: {}
  }),
  actions: {
    async showModal(payload = {}) {
      this.modal = !this.modal
      this.weather = payload
    }
  }
})
