import React from "react";
import { Box, Button, TextField, Typography, Paper } from "@mui/material";
import { useForm } from "react-hook-form";

export const RegisterPage = () => {
  const { register, handleSubmit } = useForm();
  const onSubmit = (data: any) => {
    // Production: Actual register logic
  };
  return (
    <Box sx={{minHeight:'100vh',display:'flex',alignItems:'center',justifyContent:'center',background:'#121212'}}>
      <Paper elevation={7} sx={{p:4,background:'#202632',minWidth:360,color:'#fafafa'}}>
        <Typography variant="h5" mb={2}>Create Your Account</Typography>
        <form onSubmit={handleSubmit(onSubmit)}>
          <TextField label="Name" fullWidth {...register('name')} margin="normal" autoComplete="name"/>
          <TextField label="Email" fullWidth {...register('email')} margin="normal" autoComplete="username"/>
          <TextField label="Password" type="password" {...register('password')} fullWidth margin="normal" autoComplete="new-password"/>
          <Button type="submit" fullWidth variant="contained" sx={{mt:2}}>Sign Up</Button>
        </form>
        <Button sx={{mt:2}} href="/login">Already have an account?</Button>
      </Paper>
    </Box>
  );
};

export default RegisterPage;
