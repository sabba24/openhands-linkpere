import React from "react";
import { Box, Button, TextField, Typography, Paper } from "@mui/material";
import { useForm } from "react-hook-form";

export const LoginPage = () => {
  const { register, handleSubmit } = useForm();
  const onSubmit = (data: any) => {
    // Production: Actual JWT login
  };
  return (
    <Box sx={{minHeight:'100vh',display:'flex',alignItems:'center',justifyContent:'center',background:'#111'}}>
      <Paper elevation={7} sx={{p:4,background:'#181c24',minWidth:360,color:'#fafafa'}}>
        <Typography variant="h5" mb={2}>Welcome Back</Typography>
        <form onSubmit={handleSubmit(onSubmit)}>
          <TextField label="Email" fullWidth {...register('email')} margin="normal" autoComplete="username"/>
          <TextField label="Password" type="password" {...register('password')} fullWidth margin="normal" autoComplete="current-password"/>
          <Button type="submit" fullWidth variant="contained" sx={{mt:2}}>Login</Button>
        </form>
        <Button sx={{mt:2}} href="/register">Create Account</Button>
      </Paper>
    </Box>
  );
};

export default LoginPage;
