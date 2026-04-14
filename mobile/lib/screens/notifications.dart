import 'package:flutter/material.dart';

class NotificationsScreen extends StatelessWidget{
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF0B0F1A),
      appBar: AppBar(title: Text('Notifications', style: TextStyle(color: Colors.white))),
      body: ListView.separated(
        padding: const EdgeInsets.symmetric(vertical: 20),
        itemBuilder: (_, idx) => ListTile(
          leading: CircleAvatar(backgroundColor: Color(0xFF6366F1)),
          title: Text('Someone liked your post', style: TextStyle(color: Colors.white)),
          subtitle: Text('2 min ago', style: TextStyle(color: Color(0xFFA1A1AA))),
          trailing: Icon(Icons.favorite, color: Colors.redAccent),
        ),
        separatorBuilder: (_, __) => Divider(color: Color(0xFF2A3348)),
        itemCount: 8,
      ),
    );
  }
}
