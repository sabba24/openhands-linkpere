<template>
  <div class="live-main">
    <div class="video-area">[LIVE STREAM VIDEO PLACEHOLDER]</div>
    <div class="live-overlay">
      <div class="chat">
        <div v-for="msg in chat" :key="msg.id" class="msg">{{ msg.user }}: {{ msg.text }}</div>
        <input v-model="msgInput" @keydown.enter="sendMsg" placeholder="Type a message..." autofocus />
      </div>
      <div class="gifts"><button @click="sendGift">🎁 Send Gift</button></div>
      <div class="podium">
        <div v-for="user in podium" :key="user.id" class="podium-user">🏅 {{ user.name }} ({{ user.points }})</div>
      </div>
    </div>
    <div v-if="battle">
      <div class="battle-ui">
        <span>{{ battle.user1 }} vs {{ battle.user2 }}</span>
        <span class="score">{{ battle.user1_score }} - {{ battle.user2_score }}</span>
        <span v-if="battle.status==='ended'">Winner: {{ battle.winner }}</span>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import liveSocket from '../../services/liveSocket'
const chat = ref([]), msgInput = ref(''), podium = ref([]), battle = ref(null), user = ref('user')
let socket = null

function sendMsg() {
  if (msgInput.value && socket) {
    socket.emit('live:chat', { msg: msgInput.value })
    msgInput.value = ''
  }
}
function sendGift() {
  if (socket) socket.emit('live:gift', { type: 'rose', amount: 1 })
}
onMounted(() => {
  socket = liveSocket.connectLiveSocket('<token>')
  socket.emit('join', 'live.123')
  socket.on('live:chat', data => {
    chat.value.push({ user: data.user, text: data.message })
  })
  socket.on('live:gift', data => {
    // update gift/podium if needed
  })
  socket.on('live:battle', data => {
    battle.value = data
  })
})
onUnmounted(() => {
  if (socket) {
    socket.emit('leave', 'live.123')
    socket.disconnect()
  }
})
</script>
<style scoped>
.live-main{background:#0B0F1A; color:#fff; padding:0; height:100vh; position:relative;}
.video-area{height:270px; background:#222; margin-bottom:0;}
.live-overlay{position:absolute;top:0;right:0;width:330px;height:100%;background:#121826d9;display:flex;flex-direction:column;justify-content:space-between;z-index:2;}
.chat{padding:12px;overflow:auto;flex:1;}
.gifts{padding:12px;}
.podium{border-top:1px solid #2A3348; padding:8px; background:#1A2236;}
.battle-ui{position:absolute;bottom:30px;left:50%;transform:translateX(-50%);background:#1A2236;border:2px solid #6366F1;padding:10px 20px;border-radius:16px;text-align:center;z-index:3;}
.score{font-weight:bold;margin-left:16px;}
</style>