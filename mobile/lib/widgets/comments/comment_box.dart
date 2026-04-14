import 'package:flutter/material.dart';
class CommentBox extends StatelessWidget {
  final ValueChanged<String> onSend;
  final VoidCallback onGif;
  final VoidCallback onVoice;
  final VoidCallback onGift;
  final Function(String emoji) onEmoji;
  const CommentBox({required this.onSend, required this.onGif, required this.onVoice, required this.onGift, required this.onEmoji, Key? key}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    final _controller = TextEditingController();
    final emojis = ['👍', '❤️', '😂', '🔥', '👏'];
    return Container(
      padding: EdgeInsets.all(10),
      color: Color(0xFF1A2236),
      child: Row(
        children: [
          Expanded(
            child: TextField(
              controller: _controller,
              decoration: InputDecoration(
                hintText: 'Add a comment...',
                hintStyle: TextStyle(color: Color(0xFFA1A1AA)),
                border: InputBorder.none,
              ),
              style: TextStyle(color: Colors.white),
              onSubmitted: (val) {
                if (val.trim().isNotEmpty) onSend(val.trim());
                _controller.clear();
              },
            ),
          ),
          IconButton(icon: Icon(Icons.gif, color: Color(0xFF6366F1)), onPressed: onGif),
          IconButton(icon: Icon(Icons.mic, color: Color(0xFF6366F1)), onPressed: onVoice),
          IconButton(icon: Icon(Icons.card_giftcard, color: Color(0xFF6366F1)), onPressed: onGift),
          ...emojis.map((e) => TextButton(child: Text(e, style: TextStyle(fontSize: 18)), onPressed: () => onEmoji(e))).toList(),
        ],
      ),
    );
  }
}
