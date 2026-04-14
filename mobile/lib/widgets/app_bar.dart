import 'package:flutter/material.dart';

class BrandAppBar extends StatelessWidget implements PreferredSizeWidget {
  final String title;
  final List<Widget>? actions;
  final Widget? leading;
  const BrandAppBar({super.key, required this.title, this.actions, this.leading});

  @override
  Widget build(BuildContext context) {
    return AppBar(
      backgroundColor: const Color(0xFF0B0F1A),
      elevation: 1.2,
      leading: leading,
      title: Text(title, style: const TextStyle(
        fontFamily: 'Inter', color: Colors.white, fontWeight: FontWeight.bold, fontSize: 20)),
      actions: actions,
    );
  }
  @override
  Size get preferredSize => Size.fromHeight(56);
}
