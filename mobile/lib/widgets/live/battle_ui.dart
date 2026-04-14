import 'package:flutter/material.dart';
class BattleUI extends StatelessWidget {
  final String user1, user2;
  final int user1Score, user2Score;
  final String? winner;
  const BattleUI({required this.user1,required this.user2,required this.user1Score,required this.user2Score,this.winner,Key? key}):super(key:key);
  @override
  Widget build(BuildContext context) {
    return Center(child:
      Container(
        padding:EdgeInsets.all(16),
        decoration:BoxDecoration(color:Color(0xFF1A2236),border:Border.all(color:Color(0xFF6366F1),width:2),borderRadius:BorderRadius.circular(16)),
        child:Column(mainAxisSize:MainAxisSize.min,
          children:[
            Text('$user1 vs $user2',style:TextStyle(color:Colors.white,fontWeight:FontWeight.bold)),
            Text('Score: $user1Score - $user2Score',style:TextStyle(color:Colors.white)),
            if(winner!=null) Text('Winner: $winner',style:TextStyle(color:Colors.greenAccent)),
          ]),
      ),
    );
  }
}
