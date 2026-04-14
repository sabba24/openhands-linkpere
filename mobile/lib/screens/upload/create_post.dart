import 'package:flutter/material.dart';

class CreatePostScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF0B0F1A),
      appBar: AppBar(title: Text('Create Post', style: TextStyle(color: Colors.white))),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(18),
          child: Column(
            children: [
              Container(
                  color: Colors.black26,
                  height: 200,
                  width: double.infinity,
                  child: Icon(Icons.play_circle, color: Color(0xFF6366F1), size: 80)),
              SizedBox(height: 18),
              TextField(
                decoration: InputDecoration(
                  labelText: 'Caption',
                  labelStyle: TextStyle(color: Color(0xFFA1A1AA)),
                ),
                style: TextStyle(color: Colors.white),
              ),
              SizedBox(height: 18),
              ElevatedButton(
                  style: ElevatedButton.styleFrom(
                      backgroundColor: Color(0xFF6366F1)),
                  onPressed: () {},
                  child: Text('Upload', style: TextStyle(fontWeight: FontWeight.bold)))
            ],
          ),
        ),
      ),
    );
  }
}
