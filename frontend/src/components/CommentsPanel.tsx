import React from 'react';
import { Dialog, DialogTitle, DialogContent, Box, Typography, TextField, Button, List, ListItem } from '@mui/material';
import { useFeedStore, Comment } from '../state/feedStore';

export default function CommentsPanel({open,setOpen,id}:{open:boolean,setOpen:(v:boolean)=>void,id:number}){
  const video = useFeedStore(s => s.feed.find(v=>v.id===id));
  const [text, setText] = React.useState("");
  const add = useFeedStore(s=>s.addComment);
  return (
    <Dialog open={open} onClose={()=>setOpen(false)}>
      <DialogTitle>Comments</DialogTitle>
      <DialogContent>
        <List sx={{mb:2,minHeight:110}}>
          {video?.comments.map((c,i)=>(<ListItem key={i}><b>{c.user}: </b>{c.text}</ListItem>))}
          {!video?.comments.length&&<Typography color="text.secondary">No comments yet.</Typography>}
        </List>
        <Box display="flex" gap={1}>
          <TextField fullWidth variant="outlined" size="small" value={text} placeholder="Add a comment..." onChange={e=>setText(e.target.value)}/>
          <Button onClick={async()=>{if(text){await add(id,{user:'me',text});setText("")}}} variant="contained">Send</Button>
        </Box>
      </DialogContent>
    </Dialog>
  );
}
