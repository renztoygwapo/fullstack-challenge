<script>
import { mapActions, mapState } from 'pinia'
import { useUtilStore } from '@/stores/util'
import Modal from './Modal.vue'
export default {
  components: {
    Modal
  },
  data: () => ({
    apiResponse: null
  }),
  created() {
    this.fetchData()
  },
  methods: {
    async fetchData() {
      const url = 'http://localhost/'
      this.apiResponse = await (await fetch(url)).json()
    },
    ...mapActions(useUtilStore, ['showModal']),
  },
  computed: {
    ...mapState(useUtilStore, ['modal']),
  }
}
</script>

<template>
  <div class="container-fluid mx-8">
    <div class="mt-5 px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
      <p class="mt-2 text-sm text-gray-700">A list of all the users that has their geolocation longitude and latitude.</p>
    </div>
  </div>
  <div class="mt-8 flow-root">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Email</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Long</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Lat</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-if="!this.apiResponse">
              <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"> No Record Found.</td>
            </tr>
            <tr v-else v-for="item in this.apiResponse.users" :key="item.id" @click="showModal(item)" class="cursor-pointer hover:bg-gray-100">
              <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"> {{ item.name }}</td>
              <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ item.email }}</td>
              <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ item.longitude }}</td>
              <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ item.latitude }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
    </div>
    <Modal />
  </div>
</template>
