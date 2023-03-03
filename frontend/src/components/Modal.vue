<template>
    <TransitionRoot as="template" :show="util.modal">
      <Dialog as="div" class="relative z-10" @close="open = false">
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </TransitionChild>
  
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
              <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 w-full sm:max-w-xl sm:p-6">
                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Weather Current Update</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900"> {{ util.weather.name }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Latitude</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ util.weather.latitude }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Email address</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ util.weather.email }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Longitude</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ util.weather.longitude }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">DT</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.dt }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">UVI</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.uvi }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">TEMP</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.temp }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Clouds</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.clouds }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Sunset</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.sunset }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Humidity</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.humidity }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Pressure</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.pressure }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Win Deg</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.wind_deg }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Dew Point</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.dew_point }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Wind Gust</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.wind_gust }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Feels Like</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.feels_like }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Visibility</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.visibility }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Windspeed</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ JSON.parse(util.weather.weather).current.wind_speed }}</dd>
                        </div>
                    </dl>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                  <button type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm" @click="util.showModal(util.weather)">Close</button>
                </div>
              </DialogPanel>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import { PaperClipIcon } from '@heroicons/vue/20/solid'
  import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
  import { CheckIcon } from '@heroicons/vue/24/outline'
  import { useUtilStore } from '@/stores/util'

  const util = useUtilStore()

  const report = ref({})

  onMounted(() => {
    const report = util.weather.weather
  })


  </script>
