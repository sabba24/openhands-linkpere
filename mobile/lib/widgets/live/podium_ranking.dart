import 'package:flutter/material.dart';
class PodiumRanking extends StatelessWidget {
  final List<Map> rankings;
  const PodiumRanking({required this.rankings, Key? key}):super(key:key);
  @override
  Widget build(BuildContext context) {
    return Card(
      color: Color(0xFF1A2236),
      child: Column(
        children: [
          Text('Leaderboard', style: TextStyle(color: Colors.white)),
          ...rankings.map((r) => Text('${r['name']} (${r['points']})', style: TextStyle(color: Colors.yellowAccent))).toList(),
        ],
      ),
    );
  }
}
