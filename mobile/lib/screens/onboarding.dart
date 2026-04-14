import 'package:flutter/material.dart';

class OnboardingScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF0B0F1A),
      body: SafeArea(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Expanded(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: const [
                  Icon(Icons.explore, size: 80, color: Color(0xFF6366F1)),
                  SizedBox(height: 28),
                  Text('Discover & Shop', style: TextStyle(fontSize: 28, color: Colors.white, fontFamily: 'Inter', fontWeight: FontWeight.bold)),
                  SizedBox(height: 12),
                  Text('The all-in-one vertical video commerce experience, for creators, sellers and fans.', textAlign: TextAlign.center, style: TextStyle(fontSize: 16, color: Color(0xFFA1A1AA), fontFamily: 'Inter')),
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 32, vertical: 38),
              child: ElevatedButton(
                onPressed: () {},
                style: ElevatedButton.styleFrom(backgroundColor: Color(0xFF6366F1), minimumSize: Size(double.infinity, 56)),
                child: Text('Get Started', style: TextStyle(fontFamily: 'Inter', fontWeight: FontWeight.w700, fontSize: 17))
              ),
            )
          ],
        ),
      ),
    );
  }
}
