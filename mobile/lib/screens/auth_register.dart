import 'package:flutter/material.dart';

class AuthRegisterScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF0B0F1A),
      body: Center(
        child: Container(
          padding: EdgeInsets.all(28),
          decoration: BoxDecoration(
            color: Color(0xFF1A2236),
            borderRadius: BorderRadius.circular(20),
            boxShadow: [BoxShadow(color: Colors.black26, blurRadius: 44)]
          ),
          width: 340,
          child: Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              Text("Create Your Account", style: TextStyle(fontFamily: 'Inter', color: Colors.white, fontSize: 24, fontWeight: FontWeight.bold)),
              SizedBox(height: 22),
              TextField(
                style: TextStyle(color: Colors.white),
                decoration: InputDecoration(labelText: "Name", labelStyle: TextStyle(color: Color(0xFFA1A1AA)), enabledBorder: UnderlineInputBorder(borderSide: BorderSide(color: Color(0xFF6366F1))))),
              SizedBox(height: 8),
              TextField(
                style: TextStyle(color: Colors.white),
                decoration: InputDecoration(labelText: "Email", labelStyle: TextStyle(color: Color(0xFFA1A1AA)), enabledBorder: UnderlineInputBorder(borderSide: BorderSide(color: Color(0xFF6366F1))))),
              SizedBox(height: 8),
              TextField(
                style: TextStyle(color: Colors.white),
                decoration: InputDecoration(labelText: "Password", labelStyle: TextStyle(color: Color(0xFFA1A1AA)), enabledBorder: UnderlineInputBorder(borderSide: BorderSide(color: Color(0xFF6366F1))))),
              SizedBox(height: 23),
              ElevatedButton(
                style: ElevatedButton.styleFrom(
                  backgroundColor: Color(0xFF6366F1),
                  foregroundColor: Colors.white,
                  minimumSize: Size(double.infinity, 48),
                  textStyle: TextStyle(fontWeight: FontWeight.bold, fontFamily: 'Inter')
                ),
                onPressed: () {},
                child: Text("Register")),
            ],
          ),
        ),
      ),
    );
  }
}
