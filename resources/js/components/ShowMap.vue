<script setup>


const props = defineProps({
  latitude: {
    type: String,
    required: true
  },
  longitude: {
    type: String,
    required: true
  }
})

console.log(props.latitude)
console.log(props.longitude)

</script>

<template>
    


</template>