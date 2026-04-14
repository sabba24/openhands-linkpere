import React from "react";
import { Box, Button, Typography } from "@mui/material";

export const LandingPage = () => (
  <Box sx={{minHeight:'100vh',background:'linear-gradient(135deg,#1a202c 60%,#673ab7)',display:'flex',flexDirection:'column',alignItems:'center',justifyContent:'center',color:'#fff'}}>
    <Typography variant="h2" fontWeight={800} gutterBottom>
      LINKPREE
    </Typography>
    <Typography variant="h5" mb={3}>
      Next-Gen Social & Marketplace Platform
    </Typography>
    <Button variant="contained" size="large" href="/login" sx={{m:2}}>Login</Button>
    <Button variant="outlined" size="large" href="/register">Register</Button>
  </Box>
);

export default LandingPage;