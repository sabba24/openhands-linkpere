import 'package:flutter/material.dart';

class ForgotPasswordScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF0B0F1A),
      appBar: AppBar(
        backgroundColor: Color(0xFF0B0F1A),
        elevation: 2,
        title: Text("Forgot Password", style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold)),
      ),
      body: Center(
        child: Container(
          width: 350,
          padding: EdgeInsets.all(28),
          decoration: BoxDecoration(
            color: Color(0xFF1A2236),
            borderRadius: BorderRadius.circular(20),
            boxShadow: [BoxShadow(color: Colors.black26, blurRadius: 24)]
          ),
          child: Column(
            mainAxisSize: MainAxisSize.min,
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Text("Enter your email to reset password", style: TextStyle(fontSize: 18, color: Color(0xFFA1A1AA), fontFamily: 'Inter')),
              SizedBox(height: 24),
              TextField(
                style: TextStyle(color: Colors.white),
                decoration: InputDecoration(labelText: "Email", labelStyle: TextStyle(color: Color(0xFFA1A1AA)), enabledBorder: UnderlineInputBorder(borderSide: BorderSide(color: Color(0xFF6366F1))))),
              SizedBox(height: 24),
              ElevatedButton(
                style: ElevatedButton.styleFrom(
                  backgroundColor: Color(0xFF6366F1),
                  minimumSize: Size(double.infinity, 48)),
                onPressed: () {},
                child: Text("Send Reset Link", style: TextStyle(fontFamily: 'Inter', fontWeight: FontWeight.bold))),
            ],
          ),
        ),
      ),
    );
  }
}
