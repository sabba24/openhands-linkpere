<template>
  <div class="live-podium">
    <h3>Leaderboard</h3>
    <div v-for="user in rankings" :key="user.id" class="podium-user">🏆 {{ user.name }} ({{ user.points }})</div>
  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
const rankings = ref([])
onMounted(async()=>{
  // API call to /live/leaderboard
})
</script>
<style scoped>
.live-podium{background:#1A2236;padding:18px;border-radius:12px;color:white;}
.podium-user{margin-bottom:7px;}
</style>