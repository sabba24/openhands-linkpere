import 'package:flutter/material.dart';

class SellerDashboardScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Seller Dashboard', style: TextStyle(color: Colors.white))),
      backgroundColor: Color(0xFF0B0F1A),
      body: Center(child: Text('Welcome, Seller!', style: TextStyle(color: Colors.white))),
    );
  }
}
