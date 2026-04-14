import React from "react";
import { Box, Typography, Avatar, Button, Paper, Divider, Grid } from "@mui/material";

const ProfilePage = () => (
  <Box sx={{minHeight:'100vh',background:'#181431',pt:6}}>
    <Paper sx={{display:'flex',alignItems:'center',p:4,mb:5,bgcolor:'rgba(29,25,63,.96)'}} elevation={8}>
      <Avatar src="/avatars/ava1.jpg" sx={{width:84,height:84,mr:4}}/>
      <Box>
        <Typography variant="h5" color="#fff">AvaCreator</Typography>
        <Typography fontSize={15} color="#cde">Bio: Building viral stores 🚀</Typography>
        <Box sx={{display:'flex',alignItems:'center',mt:1}}>
          <Button variant="contained" sx={{mr:1}}>Follow</Button>
          <Button variant="outlined">Message</Button>
        </Box>
      </Box>
      <Box sx={{ml:'auto',textAlign:'right'}}>
        <Typography color="#d2e">Followers: 3,241</Typography>
        <Typography color="#d2e">Following: 299</Typography>
      </Box>
    </Paper>
    <Divider sx={{mb:2}}/>
    <Typography variant="h6" color="#fff" pl={4}>Recent Videos</Typography>
    <Grid container spacing={2} p={4}>
      <Grid item xs={6} md={3}><Paper sx={{p:1,bgcolor:'#23244f'}}><img src="/videos/thumb1.jpg" alt="" style={{width:'100%',borderRadius:8}}/></Paper></Grid>
      <Grid item xs={6} md={3}><Paper sx={{p:1,bgcolor:'#23244f'}}><img src="/videos/thumb2.jpg" alt="" style={{width:'100%',borderRadius:8}}/></Paper></Grid>
    </Grid>
  </Box>
);

export default ProfilePage;
