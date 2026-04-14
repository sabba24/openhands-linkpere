<template>
  <div class="comment-box">
    <textarea v-model="text" placeholder="Add a comment..."></textarea>
    <div class="comment-toolbar">
      <button @click="sendComment">Post</button>
      <button @click="openGif">GIF</button>
      <button @click="openRecorder">🎤</button>
      <button v-for="emoji in emojis" :key="emoji" @click="addEmoji(emoji)">{{ emoji }}</button>
      <button @click="openGift">🎁</button>
    </div>
    <input ref="gifPicker" v-show="false" type="file" accept="image/gif" @change="pickGif" />
    <input ref="audioInput" v-show="false" type="file" accept="audio/*" @change="pickVoice" />
  </div>
</template>
<script setup>
import { ref } from 'vue'
const text = ref('')
const emojis = ['👍', '❤️', '😂', '🔥', '👏']
const addEmoji = e => (text.value += e)
const openGift = () => {/* show gift modal */}
const openGif = () => { /* Show GIF picker logic */ }
const openRecorder = () => { /* Voice record logic */ }
const sendComment = () => {
  // API call - send text/gif/voice/gift
}
const pickGif = () => {}
const pickVoice = () => {}
</script>
<style scoped>
.comment-box { background:#1A2236; padding:12px; border-radius: 12px; }
.comment-toolbar { display:flex; gap:8px; margin-top:8px; }
textarea { width:100%; min-height:40px; background:#121826; color:white; border-radius:8px; padding:8px; border:none; }
button { background:#6366F1; color:white; border-radius:6px; border:none; padding:4px 10px; }
</style>
