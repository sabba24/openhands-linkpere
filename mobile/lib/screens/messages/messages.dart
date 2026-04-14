import 'package:flutter/material.dart';

class MessagesListScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Messages', style: TextStyle(color: Colors.white))),
      backgroundColor: Color(0xFF0B0F1A),
      body: ListView.separated(
        padding: EdgeInsets.all(10),
        itemCount: 10,
        separatorBuilder: (context, i) => Divider(color: Color(0xFF2A3348)),
        itemBuilder: (context, i) => ListTile(
          leading: CircleAvatar(radius: 24, backgroundColor: Color(0xFF6366F1)),
          title: Text('User #$i', style: TextStyle(color: Colors.white)),
          subtitle: Text('Recent message preview here', style: TextStyle(color: Color(0xFFA1A1AA))),
          onTap: () {},
        ),
      ),
    );
  }
}
