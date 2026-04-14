import 'package:flutter/material.dart';

class SplashScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF0B0F1A),
      body: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: const [
            Icon(Icons.shopping_basket_rounded, size: 80, color: Color(0xFF6366F1)),
            SizedBox(height: 24),
            Text('LINKPREE', style: TextStyle(fontFamily: 'Inter', color: Colors.white, fontWeight: FontWeight.bold, fontSize: 44, letterSpacing: 3)),
            SizedBox(height: 8),
            Text('Social Commerce', style: TextStyle(color: Color(0xFFA1A1AA), fontSize: 18, fontFamily: 'Inter', letterSpacing: 1.2)),
          ],
        ),
      ),
    );
  }
}
