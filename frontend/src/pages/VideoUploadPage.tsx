import React, { useRef, useState } from "react";
import { Box, Button, Typography, Paper } from "@mui/material";

const VideoUploadPage = () => {
  const fileInputRef = useRef<HTMLInputElement>(null);
  const [video, setVideo] = useState<string | null>(null);
  return (
    <Box sx={{display:'flex',flexDirection:'column',alignItems:'center',justifyContent:'center',height:'100vh',background:'#17183b'}}>    
      <Paper sx={{background:'#23244f',p:5,borderRadius:3}} elevation={6}>
        <Typography fontWeight={900} fontSize={22} color="#fff" mb={2}>Upload Video</Typography>
        <Button
          variant="contained"
          component="label"
          sx={{fontWeight:700,mb:2}}
        >
          Select Video<input ref={fileInputRef} hidden accept="video/*" type="file" onChange={e=>{
            const url = e.target.files && URL.createObjectURL(e.target.files[0]);
            url && setVideo(url);
          }} />
        </Button>
        {video && <video src={video} controls style={{width:300,maxHeight:260,borderRadius:12}} />}
      </Paper>
    </Box>
  );
};

export default VideoUploadPage;
