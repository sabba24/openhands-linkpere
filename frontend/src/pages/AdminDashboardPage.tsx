import React from "react";
import { Box, Paper, Typography, Grid, Divider } from "@mui/material";

const dashCard = (label:string,value:string|number,color:string) => (
  <Paper elevation={8} sx={{p:3,minWidth:160,bgcolor:color,color:'#fff',borderRadius:3,mb:2}}>
    <Typography variant="h5" fontWeight={900}>{value}</Typography>
    <Typography variant="body1">{label}</Typography>
  </Paper>
)

const AdminDashboardPage = () => (
  <Box sx={{p:5,minHeight:'100vh',background:'#0a0f1b'}}>
    <Typography variant="h4" mb={3} fontWeight={800} color="#fff">Admin Dashboard</Typography>
    <Box sx={{display:'flex',gap:4,mb:3,overflowX:'auto'}}>
      {dashCard('Total Users',9123,'#23244f')}
      {dashCard('Videos',6121,'#673ab7')}
      {dashCard('Orders',832,"#b90e4a")}
      {dashCard('Sales','$28,120','#424242')}
    </Box>
    <Divider sx={{mb:3}}/>
    <Grid container spacing={2}>
      <Grid item md={6} xs={12}><Paper sx={{p:3,height:'100%'}}>Top Creator: AvaCreator (12k Sales)</Paper></Grid>
      <Grid item md={6} xs={12}><Paper sx={{p:3,height:'100%'}}>Pending Video Moderation: 13</Paper></Grid>
      <Grid item md={6} xs={12}><Paper sx={{p:3,height:'100%'}}>Orders to Review: 42</Paper></Grid>
      <Grid item md={6} xs={12}><Paper sx={{p:3,height:'100%'}}>Analytics: +14% user growth</Paper></Grid>
    </Grid>
  </Box>
);

export default AdminDashboardPage;
