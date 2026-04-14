import 'package:flutter/material.dart';
import '../widgets/bottom_nav.dart';
import 'feed.dart';
import 'marketplace.dart';
import 'notifications.dart';
import 'profile.dart';

class HomeScreen extends StatefulWidget {
  @override
  State<HomeScreen> createState() => _HomeScreenState();
}
class _HomeScreenState extends State<HomeScreen> {
  int _selected = 0;
  final _screens = [FeedScreen(), MarketplaceScreen(), NotificationsScreen(), ProfileScreen()];
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: _screens[_selected],
      bottomNavigationBar: BottomNavBar(currentIndex: _selected, onTap: (i) => setState(() => _selected = i)),
    );
  }
}
