import 'package:flutter/material.dart';
import '../widgets/product_card.dart';

class MarketplaceScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF121826),
      appBar: AppBar(
        title: Text("Marketplace", style: TextStyle(color: Colors.white)),
        backgroundColor: Color(0xFF0B0F1A),
        elevation: 2,
      ),
      body: GridView.builder(
        padding: EdgeInsets.all(16),
        gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
          crossAxisCount: 2,
          childAspectRatio: .75,
          crossAxisSpacing: 14,
          mainAxisSpacing: 18,
        ),
        itemBuilder: (context, idx) => ProductCardWidget(index: idx),
        itemCount: 8,
      ),
    );
  }
}
