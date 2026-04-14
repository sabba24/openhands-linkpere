import 'package:flutter/material.dart';

class OrdersScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Orders', style: TextStyle(color: Colors.white))),
      backgroundColor: Color(0xFF0B0F1A),
      body: Center(
          child: Text('You have no orders.', style: TextStyle(color: Colors.white))),
    );
  }
}
