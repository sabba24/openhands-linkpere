import 'package:flutter/material.dart';
class LiveScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF0B0F1A),
      body: Stack(children: [
        Container(height: 280, color: Colors.black12, alignment: Alignment.center, child: Text('LIVE STREAM VIDEO', style: TextStyle(color: Colors.white))),
        Align(
          alignment: Alignment.bottomRight,
          child: Container(
            width: 340,
            color: Color(0xDD121826),
            child: Column(mainAxisSize: MainAxisSize.min, crossAxisAlignment: CrossAxisAlignment.start, children: [
              Text('Live Chat', style: TextStyle(color: Colors.white)),
              Container(height:87, child: ListView(children:[Text('msg1',style:TextStyle(color:Colors.white))])),
              Row(children:[
                Expanded(child: TextField(decoration: InputDecoration(hintText:'Type...',hintStyle:TextStyle(color:Color(0xFFA1A1AA)))),),
                IconButton(onPressed:()=>{},icon:Icon(Icons.send,color:Color(0xFF6366F1)))
              ]),
              ElevatedButton(onPressed:()=>{},child:Text('Send Gift 🎁')), 
            ]),
          ),
        ),
      ]),
    );
  }
}
