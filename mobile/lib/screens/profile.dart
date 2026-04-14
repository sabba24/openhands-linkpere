import 'package:flutter/material.dart';
import '../widgets/app_bar.dart';

class ProfileScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: BrandAppBar(title: 'Profile'),
      backgroundColor: Color(0xFF0B0F1A),
      body: Padding(
        padding: const EdgeInsets.symmetric(vertical: 28, horizontal: 18),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            CircleAvatar(radius: 46, backgroundColor: Color(0xFF6366F1)),
            SizedBox(height: 18),
            Text('@username', style: TextStyle(fontWeight: FontWeight.bold, fontSize: 23, color: Colors.white, fontFamily: 'Inter')),
            SizedBox(height: 8),
            Text('Creator | Shopper | Seller', style: TextStyle(fontSize: 14, color: Color(0xFFA1A1AA), fontFamily: 'Inter')),
            SizedBox(height: 18),
            Row(mainAxisAlignment: MainAxisAlignment.center, children: [
              Column(children:[Text('12K', style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold)), Text('Followers', style: TextStyle(color: Color(0xFFA1A1AA)))]),
              SizedBox(width:30),
              Column(children:[Text('2K', style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold)), Text('Following', style: TextStyle(color: Color(0xFFA1A1AA)))]),
              SizedBox(width:30),
              Column(children:[Text('130', style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold)), Text('Likes', style: TextStyle(color: Color(0xFFA1A1AA)))]),
            ]),
            const SizedBox(height: 32),
            ElevatedButton(
              onPressed: () {},
              style: ElevatedButton.styleFrom(
                backgroundColor: Color(0xFF6366F1),
                minimumSize: Size(double.infinity, 48)),
              child: Text('Edit Profile', style: TextStyle(fontFamily: 'Inter', fontWeight: FontWeight.w700))),
            const SizedBox(height: 12),
            OutlinedButton(
                style: OutlinedButton.styleFrom(
                  minimumSize: Size(double.infinity, 44), foregroundColor: Color(0xFFA1A1AA), side: BorderSide(color: Color(0xFF6366F1), width: 2)),
                onPressed: () {}, child: Text('Settings')),
          ],
        ),
      ),
    );
  }
}
