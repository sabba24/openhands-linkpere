import React from "react";
import { Box, Avatar, Typography, IconButton, Button, Paper } from "@mui/material";
import FavoriteBorderIcon from "@mui/icons-material/FavoriteBorder";
import ChatBubbleOutlineIcon from "@mui/icons-material/ChatBubbleOutline";
import ShareIcon from "@mui/icons-material/Share";
import PlayCircleIcon from '@mui/icons-material/PlayCircle';

interface User { name: string; avatar: string }
interface Product { name: string; price: number; image: string }
interface Props {
  url: string; user: User; caption: string; likes: number; comments: number; shares: number; shop?: boolean;
  product?: Product;
}

const VideoCard: React.FC<Props> = ({ url, user, caption, likes, comments, shares, shop, product }) => (
  <Box sx={{height:'100vh',position:'relative',display:'flex',flexDirection:'column',justifyContent:'flex-end'}}>
    <video src={url} controls style={{width:'100%',height:'100%',objectFit:'cover',position:'absolute',top:0,left:0,zIndex:0}}/>
    <Box sx={{position:'absolute',bottom:88,left:0,p:3,zIndex:1,color:'#fff',width:'100%',display:'flex',alignItems:'center'}}>
      <Avatar src={user.avatar} alt={user.name} sx={{mr:2}}/>
      <Box>
        <Typography fontWeight={700}>{user.name}</Typography>
        <Typography fontSize={13}>{caption}</Typography>
      </Box>
      <Box sx={{ml:'auto',display:'flex'}}> 
        <IconButton color="primary"><FavoriteBorderIcon /></IconButton>
        <IconButton color="primary"><ChatBubbleOutlineIcon /></IconButton>
        <IconButton color="primary"><ShareIcon /></IconButton>
      </Box>
    </Box>
    {shop && product && (
      <Paper elevation={9} sx={{position:'absolute',bottom:12,left:'2%',background:'rgba(23,16,53,.98)',color:'#fff',py:1,px:3,display:'flex',alignItems:'center',borderRadius:4,boxShadow:'0 4px 16px 0 #2e0e33'}}>
        <img src={product.image} alt={product.name} style={{width:54,height:54,objectFit:'cover',borderRadius:10,marginRight:16}}/>
        <Box>
          <Typography fontWeight={800}>{product.name}</Typography>
          <Typography fontSize={13}>${product.price}</Typography>
        </Box>
        <Button variant="contained" color="secondary" sx={{ml:3,bgcolor:'#e4007b',color:'#fff',fontWeight:900}}>
          Shop Now
        </Button>
      </Paper>
    )}
    <PlayCircleIcon sx={{position:'absolute',top:'50%',left:'50%',transform:'translate(-50%,-50%)',fontSize:96,opacity:.18}}/>
  </Box>
);

export default VideoCard;
