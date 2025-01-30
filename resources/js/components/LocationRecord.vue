<script setup>
import { GoogleMap, Marker } from 'vue3-google-map'
import { ref, watch } from "vue";

const MAP_API_KEY = import.meta.env.VITE_GOOGLEMAP_API_KEY

const isMap = ref(false);
const Lat = ref(0);
const Lng = ref(0);
const center = ref({ lat: 0, lng: 0 }); 

const getLocation = () => {
    navigator.geolocation.getCurrentPosition(
            // success
            function(position) {
                Lat.value = position.coords.latitude.toFixed(6);
                Lng.value = position.coords.longitude.toFixed(6);
                console.log(`Latitude: ${Lat.value}, Longitude: ${Lng.value}`);
                isMap.value = true;
            },
            // error 
            function(error) {
                console.error(`Error : ${error.message}`);
            }
    );
} 

watch([Lat, Lng], () => {
  center.value = { lat: parseFloat(Lat.value), lng: parseFloat(Lng.value) };
  console.log("Lat または Lng が更新されました");
});

</script>

<template>
    
<button type="button" class="btn btn-outline btn-info" @click="getLocation">現在地を取得する</button>

<GoogleMap v-show="isMap"
  :api-key="MAP_API_KEY"
  style="width: 250px; height: 250px"
  :center="center"
  :zoom="15"
  >
    <Marker :options="{ position: center }" />
</GoogleMap>   


<div class="form-control my-4">
  <label for="latitude" class="label">
      <span class="label-text">緯度:</span>
  </label>
  <input type="text" v-model="Lat" placeholder="111.111111(小数点以下6桁)"  name="latitude" class="input input-bordered w-full">
</div>

<div class="form-control my-4">
    <label for="longitude" class="label">
        <span class="label-text">経度:</span>
    </label>
    <input type="text" v-model="Lng" placeholder="111.111111(小数点以下6桁)" name="longitude" class="input input-bordered w-full">
</div>

<div class="form-control my-4">
    <label for="memo" class="label">
        <span class="label-text">備考:</span>
    </label>
    <input type="text" name="memo" class="input input-bordered w-full">
</div>

<button type="submit" class="btn btn-primary btn-outline">追加</button>

</template>