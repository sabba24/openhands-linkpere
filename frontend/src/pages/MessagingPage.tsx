import React, { useState } from "react";
import { Box, List, ListItem, ListItemAvatar, Avatar, ListItemText, Paper, Typography, TextField, Button } from "@mui/material";

const chats = [{ id: 1, user: { name: "AvaCreator", avatar: "/avatars/ava1.jpg" }, last: "See you at 8pm!" }];
const messages = [{from:"me",text:"Hey! Your products rock!"},{from:"ava",text:"Thanks!"}];

const MessagingPage = () => {
  const [msg, setMsg] = useState("");
  return (
    <Box sx={{display:'flex',height:'100vh'}}>
      <Paper sx={{minWidth:250,background:'#181b24',height:'100vh'}}>
        <List>
          {chats.map(c=>(<ListItem button key={c.id}><ListItemAvatar><Avatar src={c.user.avatar}/></ListItemAvatar><ListItemText primary={c.user.name} secondary={c.last}/></ListItem>))}
        </List> 
      </Paper>
      <Box sx={{flex:1,display:'flex',flexDirection:'column',background:'#23244f',justifyContent:'flex-end'}}>
        <Box sx={{px:4,pt:2,overflowY:'auto'}}>
          {messages.map((m,i)=>(<Typography key={i} align={m.from==="me"?"right":"left"} sx={{color:"#fff",mb:1}}><Paper sx={{display:'inline-block',px:3,py:1,bgcolor:m.from==="me"?"#3f51b5":"#ea0089",color:"#fff"}}>{m.text}</Paper></Typography>))}
        </Box>
        <Box sx={{display:'flex',p:2}}>
          <TextField value={msg} onChange={e=>setMsg(e.target.value)} fullWidth placeholder="Type a message..." InputProps={{sx:{color:'#fff'}}}/>
          <Button variant="contained" onClick={()=>setMsg("")} sx={{ml:2,fontWeight:800}}>Send</Button>
        </Box>
      </Box>
    </Box>
  );
};

export default MessagingPage;