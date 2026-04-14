import 'package:flutter/material.dart';
class CommentList extends StatelessWidget {
  final List<dynamic> comments;
  const CommentList(this.comments, {Key? key}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return ListView(
      shrinkWrap: true,
      children: comments.map((comment) {
        return Card(
          color: Color(0xFF121826),
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(8)),
          margin: EdgeInsets.symmetric(vertical: 7),
          child: Padding(
            padding: const EdgeInsets.all(12),
            child: Column(crossAxisAlignment: CrossAxisAlignment.start, children: [
              Text(comment['user']?['name']??'', style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold)),
              if (comment['text']!=null) Text(comment['text'], style: TextStyle(color: Colors.white)),
              if (comment['gif']!=null) Image.network(comment['gif']['gif_url'], width: 64),
              if (comment['voiceNote']!=null) Text('Voice: (play)', style: TextStyle(color: Color(0xFFA1A1AA))),
              if (comment['gifts']!=null && comment['gifts'].length>0) Text('🎁 ${comment['gifts'].length}', style: TextStyle(color: Color(0xFF6366F1))),
              if (comment['emojiReactions']!=null)
                Wrap(
                  children: List<Widget>.from((comment['emojiReactions'] as List).map((r)=>Text(r['emoji'], style: TextStyle(fontSize:18))))
                )
            ]),
          ),
        );
      }).toList(),
    );
  }
}
