import 'package:flutter/material.dart';
import '../../services/live_socket_service.dart';

class LiveScreen extends StatefulWidget {
  @override
  State<LiveScreen> createState() => _LiveScreenState();
}
class _LiveScreenState extends State<LiveScreen> {
  final LiveSocketService liveSocket = LiveSocketService();
  final TextEditingController inputCtrl = TextEditingController();
  List<Map<String, String>> chat = [];

  @override
  void initState() {
    super.initState();
    liveSocket.connect('userToken');
    liveSocket.joinRoom('live.123');
    liveSocket.onChat((data) {
      setState(() {
        chat.add({'user': data['user'], 'msg': data['message']});
      });
    });
  }
  @override
  void dispose() {
    liveSocket.leaveRoom('live.123');
    liveSocket.disconnect();
    super.dispose();
  }
  void sendMsg() {
    if (inputCtrl.text.isNotEmpty) {
      liveSocket.sendChat(inputCtrl.text);
      inputCtrl.clear();
    }
  }

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
              Container(
                height:87,
                child: ListView(
                  children: chat
                    .map((m)=>Text('${m['user']}: ${m['msg']}', style:TextStyle(color:Colors.white)))
                    .toList(),
                ),
              ),
              Row(children:[
                Expanded(child:
                  TextField(
                    controller: inputCtrl,
                    decoration: InputDecoration(hintText:'Type...',hintStyle:TextStyle(color:Color(0xFFA1A1AA)))
                  ),
                ),
                IconButton(onPressed:sendMsg,icon:Icon(Icons.send,color:Color(0xFF6366F1)))
              ]),
              ElevatedButton(onPressed:()=>liveSocket.sendGift('rose',1),child:Text('Send Gift 🎁')), 
            ]),
          ),
        ),
      ]),
    );
  }
}
