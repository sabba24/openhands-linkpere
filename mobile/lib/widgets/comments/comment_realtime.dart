import 'dart:async';
class CommentRealtime {
  Timer? _timer;
  void start(Function getComments) {
    stop();
    _timer = Timer.periodic(Duration(seconds:3), (t) => getComments());
  }
  void stop() { _timer?.cancel(); }
}
