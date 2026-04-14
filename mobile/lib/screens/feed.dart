import 'package:flutter/material.dart';
import '../widgets/video_card.dart';

class FeedScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return PageView.builder(
      scrollDirection: Axis.vertical,
      itemCount: 8, // Replace with feed length
      itemBuilder: (context, idx) => VideoCardWidget(index: idx),
    );
  }
}
