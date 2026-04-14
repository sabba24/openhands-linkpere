import 'package:flutter/material.dart';

class AppColors {
  static const background = Color(0xFF0B0F1A);
  static const surface = Color(0xFF121826);
  static const card = Color(0xFF1A2236);
  static const accent = Color(0xFF6366F1);
  static const success = Color(0xFF22C55E);
  static const danger = Color(0xFFEF4444);
  static const textPrimary = Color(0xFFFFFFFF);
  static const textSecondary = Color(0xFFA1A1AA);
  static const border = Color(0xFF2A3348);
}

final appTheme = ThemeData(
  brightness: Brightness.dark,
  primaryColor: AppColors.accent,
  scaffoldBackgroundColor: AppColors.background,
  fontFamily: 'Inter',
  cardColor: AppColors.card,
  colorScheme: ColorScheme.dark(
    primary: AppColors.accent,
    background: AppColors.background,
    secondary: AppColors.surface),
  appBarTheme: const AppBarTheme(
    backgroundColor: AppColors.background,
    titleTextStyle: TextStyle(
      color: AppColors.textPrimary,
      fontWeight: FontWeight.bold,
      fontFamily: 'Inter',
      fontSize: 20,
    ),
    iconTheme: IconThemeData(color: AppColors.accent),
  ),
  textTheme: const TextTheme(
    bodyLarge: TextStyle(color: AppColors.textPrimary),
    bodyMedium: TextStyle(color: AppColors.textSecondary),
  ),
);
