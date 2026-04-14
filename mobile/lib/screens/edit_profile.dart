import 'package:flutter/material.dart';

class EditProfileScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Edit Profile', style: TextStyle(color: Colors.white))),
      backgroundColor: Color(0xFF0B0F1A),
      body: Padding(
        padding: const EdgeInsets.all(24),
        child: Column(
          children: [
            CircleAvatar(radius: 46, backgroundColor: Color(0xFF6366F1)),
            SizedBox(height: 14),
            TextField(
              decoration: InputDecoration(labelText: 'Username', labelStyle: TextStyle(color: Color(0xFFA1A1AA))),
              style: TextStyle(color: Colors.white),
            ),
            SizedBox(height: 8),
            TextField(
              decoration: InputDecoration(labelText: 'Bio', labelStyle: TextStyle(color: Color(0xFFA1A1AA))),
              style: TextStyle(color: Colors.white),
            ),
            SizedBox(height: 20),
            ElevatedButton(
              style: ElevatedButton.styleFrom(backgroundColor: Color(0xFF6366F1)),
              onPressed: () {},
              child: Text('Save', style: TextStyle(fontFamily: 'Inter', fontWeight: FontWeight.bold))),
          ],
        ),
      ),
    );
  }
}
