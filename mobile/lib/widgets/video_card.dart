import 'package:flutter/material.dart';

class VideoCardWidget extends StatelessWidget {
  final int index;
  const VideoCardWidget({super.key, required this.index});

  @override
  Widget build(BuildContext context) {
    return Container(
      color: const Color(0xFF1A2236),
      child: Stack(
        children: [
          Center(child: Icon(Icons.play_circle_fill, color: Color(0xFF6366F1), size: 96)),
          Positioned(
            bottom: 32, left: 24, right: 24,
            child: Row(
              crossAxisAlignment: CrossAxisAlignment.end,
              children: [
                CircleAvatar(radius: 28, backgroundColor: Color(0xFF6366F1)),
                const SizedBox(width: 18),
                Expanded(
                  child: Column(
                    mainAxisSize: MainAxisSize.min,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: const [
                      Text("@creator", style: TextStyle(fontSize: 18, color: Colors.white, fontWeight: FontWeight.w700)),
                      Text("This is a trending video caption on LINKPREE.", style: TextStyle(fontSize: 15, color: Color(0xFFA1A1AA)))
                    ],
                  ),
                ),
                Column(
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    IconButton(icon: Icon(Icons.favorite_border), onPressed: () {}),
                    Text("1.3K", style: TextStyle(color: Colors.white)),
                    IconButton(icon: Icon(Icons.comment), onPressed: () {}),
                    Text("32", style: TextStyle(color: Colors.white)),
                    IconButton(icon: Icon(Icons.share), onPressed: () {}),
                  ],
                )
              ],
            ),
          ),
        ],
      ),
    );
  }
}
