import React from "react";
import { Box, Typography, Paper, Grid, Avatar, Divider } from "@mui/material";

const statCard = (title:string,value:number|string) => (
  <Paper elevation={5} sx={{p:3,minWidth:120,mr:2,display:'inline-block',background:'#23244f',color:'#fafafa',borderRadius:3}}>
    <Typography variant="h6" fontWeight={900}>{value}</Typography>
    <Typography variant="body2">{title}</Typography>
  </Paper>
)

const UserDashboardPage = () => (
  <Box sx={{p:{xs:0,sm:4},pb:8,minHeight:'100vh',background:"#17183b"}}>
    <Box sx={{display:'flex',alignItems:'center',mb:3}}>
      <Avatar src="/avatars/user1.jpg" sx={{width:78,height:78,mr:3}}/>
      <Box>
        <Typography variant="h5">Hi, Creator!</Typography>
        <Typography variant="body2">Level: Verified</Typography>
      </Box>
    </Box>
    <Box sx={{display:'flex',overflowX:'auto',mb:2}}>
      {statCard('Followers',3220)}
      {statCard('Following',189)}
      {statCard('Videos',48)}
      {statCard('Products Sold',71)}
    </Box>
    <Divider sx={{my:2}}/>
    <Typography variant="h6" mb={2}>Recent Activity</Typography>
    <Grid container spacing={2}>
      <Grid item xs={12} sm={6}><Paper sx={{p:2}}>Latest Video: "Go Viral on LINKPREE" (3k views)</Paper></Grid>
      <Grid item xs={12} sm={6}><Paper sx={{p:2}}>Recent Order: #099122 (Delivered)</Paper></Grid>
    </Grid>
  </Box>
);

export default UserDashboardPage;
