<template>
  <div>
    <div v-for="comment in comments" :key="comment.id" class="c-item">
      <span>{{ comment.user.name }}</span>
      <span v-if="comment.text">{{ comment.text }}</span>
      <img v-if="comment.gif" :src="comment.gif.gif_url" class="gif" />
      <audio v-if="comment.voiceNote" :src="comment.voiceNote.voice_url" controls></audio>
      <span v-if="comment.gifts && comment.gifts.length">🎁 {{ comment.gifts.length }}</span>
      <span v-for="r in (comment.emojiReactions || [])" :key="r.id">{{ r.emoji }}</span>
    </div>
  </div>
</template>
<script setup>
import {ref, onMounted} from 'vue'
const comments = ref([])
const fetchComments = async ()=>{
   // API call to backend
}
onMounted(fetchComments)
</script>
<style scoped>
.c-item { margin-bottom:16px; background:#121826; padding:10px; border-radius:8px; color:white; }
.gif { max-width:64px; border-radius:8px; }
</style>
