import 'package:flutter/material.dart';
import 'screens/feed.dart';
import 'screens/auth_login.dart';
import 'screens/auth_register.dart';
import 'screens/marketplace.dart';
import 'screens/cart.dart';
import 'screens/orders.dart';
import 'screens/notifications.dart';
import 'screens/messaging.dart';
import 'screens/profile.dart';
import 'screens/seller_dashboard.dart';
import 'screens/user_dashboard.dart';

final _theme = ThemeData(
  primaryColor: Color(0xFF6366F1),
  scaffoldBackgroundColor: Color(0xFF0B0F1A),
  fontFamily: 'Inter',
  cardColor: Color(0xFF1A2236),
  colorScheme: ColorScheme.fromSwatch().copyWith(secondary: Color(0xFF121826)),
  appBarTheme: AppBarTheme(
    color: Color(0xFF0B0F1A),
    titleTextStyle: TextStyle(color: Color(0xFFFFFFFF), fontWeight: FontWeight.bold, fontFamily: 'Inter', fontSize: 20),
    iconTheme: IconThemeData(color: Color(0xFF6366F1)),
  ),
  textTheme: const TextTheme(
    bodyLarge: TextStyle(color: Color(0xFFFFFFFF)),
    bodyMedium: TextStyle(color: Color(0xFFA1A1AA)),
  ),
);

class LinkpreeApp extends StatelessWidget {
  const LinkpreeApp({super.key});
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      theme: _theme,
      initialRoute: '/feed',
      routes: {
        '/login': (_) => AuthLoginScreen(),
        '/register': (_) => AuthRegisterScreen(),
        '/feed': (_) => FeedScreen(),
        '/marketplace': (_) => MarketplaceScreen(),
        '/cart': (_) => CartScreen(),
        '/orders': (_) => OrdersScreen(),
        '/notifications': (_) => NotificationsScreen(),
        '/messages': (_) => MessagingScreen(),
        '/profile': (_) => ProfileScreen(),
        '/seller': (_) => SellerDashboardScreen(),
        '/dashboard': (_) => UserDashboardScreen(),
      },
    );
  }
}
