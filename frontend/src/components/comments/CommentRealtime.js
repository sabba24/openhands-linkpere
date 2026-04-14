import { ref } from 'vue'
export function useCommentRealtime(postId, getComments) {
  let interval = null
  const start = () => {
    stop();
    interval = setInterval(()=>getComments(), 3000);
  }
  const stop = () => { if (interval) clearInterval(interval); }
  return { start, stop }
}
