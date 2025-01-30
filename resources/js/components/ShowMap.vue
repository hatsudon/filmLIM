<script setup>
import { GoogleMap, Marker } from 'vue3-google-map'


const props = defineProps({
  latitude: {
    type: Number,
    required: true
  },
  longitude: {
    type: Number,
    required: true
  }
})

const MAP_API_KEY = import.meta.env.VITE_GOOGLEMAP_API_KEY

const center = { lat: parseFloat(props.latitude), lng: parseFloat(props.longitude) }

</script>

<template>

  <GoogleMap
  :api-key="MAP_API_KEY"
  style="width: 250px; height: 250px"
  :center="center"
  :zoom="15"
  >
    <Marker :options="{ position: center }" />
  </GoogleMap>   

</template>