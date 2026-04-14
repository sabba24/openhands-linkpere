import 'package:flutter/material.dart';

class SellerProductsScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Your Products', style: TextStyle(color: Colors.white))),
      backgroundColor: Color(0xFF0B0F1A),
      body: Center(child: Text('List of products you sell will be here.', style: TextStyle(color: Colors.white))),
    );
  }
}
