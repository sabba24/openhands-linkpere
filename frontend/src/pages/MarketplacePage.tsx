import React from "react";
import { Box, Paper, Typography, Button, Grid, Card, CardMedia, CardContent } from "@mui/material";

const products = [
  { name: "Viral Tee", price: 27, image: "/products/tee.jpg", desc: "Go viral with your style!" },
  { name: "Creator Cap", price: 17, image: "/products/cap.jpg", desc: "Unleash your creative side." }
];

const MarketplacePage = () => (
  <Box sx={{minHeight:'100vh',p:4,background:'#181b24'}}>
    <Typography variant="h4" pb={2} color="#fff">Marketplace</Typography>
    <Grid container spacing={3}>
      {products.map((p,i) => (
        <Grid item xs={12} sm={6} md={4} key={i}>
          <Card sx={{bgcolor:'#23244f',color:'#fff',height:320,display:'flex',flexDirection:'column'}}>
            <CardMedia component="img" height="180" image={p.image} alt={p.name}/>
            <CardContent>
              <Typography fontWeight={700} variant="h6">{p.name} <span style={{color:'#ea0089'}}>${p.price}</span></Typography>
              <Typography fontSize={13} mb={2}>{p.desc}</Typography>
              <Button variant="contained" color="secondary">Add to Cart</Button>
            </CardContent>
          </Card>
        </Grid>
      ))}
    </Grid>
  </Box>
);

export default MarketplacePage;
