import 'package:flutter/material.dart';

class ProductCardWidget extends StatelessWidget {
  final int index;
  const ProductCardWidget({super.key, required this.index});

  @override
  Widget build(BuildContext context) {
    return Card(
      color: const Color(0xFF1A2236),
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(17), side: BorderSide(color: Color(0xFF2A3348))),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          Container(
            height: 120,
            width: double.infinity,
            decoration: BoxDecoration(
              color: const Color(0xFF121826),
              borderRadius: BorderRadius.vertical(top: Radius.circular(17)),
            ),
            child: Center(child: Icon(Icons.shopping_bag, color: Color(0xFF6366F1), size: 48)),
          ),
          Padding(
            padding: const EdgeInsets.symmetric(vertical: 8.0, horizontal: 5),
            child: Text(
              "Product Name $index",
              style: TextStyle(color: Colors.white, fontWeight: FontWeight.w700, fontFamily: 'Inter', fontSize: 16),
              textAlign: TextAlign.center,
            ),
          ),
          Text(
            "\$${(index + 1) * 15}",
            style: TextStyle(color: Color(0xFF6366F1), fontFamily: 'Inter', fontWeight: FontWeight.bold, fontSize: 16),
          ),
          Spacer(),
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: ElevatedButton(
              onPressed: () {},
              style: ElevatedButton.styleFrom(
                backgroundColor: Color(0xFF6366F1),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(8))
              ),
              child: const Text("Shop Now", style: TextStyle(fontFamily: 'Inter', fontWeight: FontWeight.bold)),
            ),
          )
        ],
      ),
    );
  }
}
