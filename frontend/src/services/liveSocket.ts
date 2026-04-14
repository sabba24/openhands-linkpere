import { io, Socket } from 'socket.io-client'
let socket: Socket|null = null
export function connectLiveSocket(token: string) {
  // adapt url/with auth token if needed, set ws path
  socket = io(import.meta.env.VITE_LIVE_SOCKET_URL || '/', {
    transports: ['websocket'],
    auth: { token },
  })
  return socket
}
export function getSocket() { return socket }
export function joinLiveRoom(room: string) {
  if (socket) socket.emit('join', room)
}
export function leaveLiveRoom(room: string) {
  if (socket) socket.emit('leave', room)
}
export default { connectLiveSocket, getSocket, joinLiveRoom, leaveLiveRoom }
