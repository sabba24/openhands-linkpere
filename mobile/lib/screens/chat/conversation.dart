import 'package:flutter/material.dart';

class ConversationScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF0B0F1A),
      appBar: AppBar(title: Text('Chat', style: TextStyle(color: Colors.white))),
      body: Column(
        children: [
          Expanded(
            child: ListView(
              children: [
                ListTile(
                  leading: CircleAvatar(),
                  title: Text('Hi! Need any help?', style: TextStyle(color: Colors.white)),
                  subtitle: Text('12:01 PM', style: TextStyle(color: Color(0xFFA1A1AA))),
                )
              ],
            ),
          ),
          Padding(
            padding: EdgeInsets.symmetric(horizontal: 16, vertical: 12),
            child: Row(
              children: [
                Expanded(
                  child: Container(
                    decoration: BoxDecoration(color: Color(0xFF1A2236), borderRadius: BorderRadius.circular(24)),
                    child: TextField(
                      decoration: InputDecoration(
                        hintText: "Type a message",
                        hintStyle: TextStyle(color: Color(0xFFA1A1AA)),
                        border: InputBorder.none,
                        contentPadding: EdgeInsets.symmetric(horizontal: 20),
                      ),
                      style: TextStyle(color: Colors.white),
                    ),
                  ),
                ),
                IconButton(onPressed: () {}, icon: Icon(Icons.send, color: Color(0xFF6366F1)))
              ],
            ),
          )
        ],
      ),
    );
  }
}
