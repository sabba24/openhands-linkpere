import 'package:socket_io_client/socket_io_client.dart' as IO;

class LiveSocketService {
  IO.Socket? socket;

  void connect(String token) {
    socket = IO.io(
      'ws://<backend-socket-url>',
      IO.OptionBuilder().setTransports(['websocket']).setAuth({'token': token}).build(),
    );
  }

  void joinRoom(String room) {
    socket?.emit('join', room);
  }
  void leaveRoom(String room) {
    socket?.emit('leave', room);
  }
  void sendChat(String msg) {
    socket?.emit('live:chat', {'msg': msg});
  }
  void sendGift(String type, int amt) {
    socket?.emit('live:gift', {'type': type, 'amount': amt});
  }
  void onChat(void Function(dynamic) handler) {
    socket?.on('live:chat', handler);
  }
  void onGift(void Function(dynamic) handler) {
    socket?.on('live:gift', handler);
  }
  void onBattle(void Function(dynamic) handler) {
    socket?.on('live:battle', handler);
  }
  void disconnect() {
    socket?.disconnect();
  }
}
