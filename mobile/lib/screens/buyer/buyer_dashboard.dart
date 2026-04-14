import 'package:flutter/material.dart';

class BuyerDashboardScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Buyer Dashboard', style: TextStyle(color: Colors.white))),
      backgroundColor: Color(0xFF0B0F1A),
      body: Center(
          child: Text('Welcome, Buyer!', style: TextStyle(color: Colors.white))),
    );
  }
}
