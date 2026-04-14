import React from "react";
import { Box, Paper, Typography, List, ListItem, ListItemAvatar, Avatar, ListItemText } from "@mui/material";

const items = [
  { id: 1, user: { name: "AvaCreator", avatar: "/avatars/ava1.jpg" }, text: "liked your video" },
  { id: 2, user: { name: "StoreBot", avatar: "/avatars/bot1.jpg" }, text: "your order #099122 shipped" }
];

const NotificationsPage = () => (
  <Box sx={{p:4,minHeight:'100vh',background:'#24173b'}}>
    <Typography variant="h5" color="#fff" mb={2}>Notifications</Typography>
    <Paper sx={{maxWidth:420,background:'#181b24',p:3}}>
      <List>
        {items.map((item) => (
          <ListItem key={item.id}>
            <ListItemAvatar><Avatar src={item.user.avatar}/></ListItemAvatar>
            <ListItemText primary={<span style={{color:'#fff'}}>{item.user.name}</span>} secondary={<span style={{color:'#eee'}}>{item.text}</span>}/>
          </ListItem>
        ))}  
      </List>
    </Paper>
  </Box>
);

export default NotificationsPage;
