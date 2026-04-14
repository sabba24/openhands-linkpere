import React from "react";
import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import LandingPage from "./pages/LandingPage";
import LoginPage from "./pages/LoginPage";
import RegisterPage from "./pages/RegisterPage";
import FeedPage from "./pages/FeedPage";
import UserDashboardPage from "./pages/UserDashboardPage";
import AdminDashboardPage from "./pages/AdminDashboardPage";
import ProfilePage from "./pages/ProfilePage";
import MarketplacePage from "./pages/MarketplacePage";
import MessagingPage from "./pages/MessagingPage";
import NotificationsPage from "./pages/NotificationsPage";
import VideoUploadPage from "./pages/VideoUploadPage";
import { ThemeProvider, CssBaseline, createTheme } from "@mui/material";

const theme = (mode: "light" | "dark") => createTheme({
  palette: { mode, primary: { main: "#5f21e6" }, secondary: { main: "#ea0089" } },
  typography: { fontFamily: 'Inter, sans-serif' },
  shape: { borderRadius: 14 }
});

function App() {
  const [dark, setDark] = React.useState(true);
  return (
    <ThemeProvider theme={theme(dark ? "dark" : "light")}>  
      <CssBaseline />
      <BrowserRouter>
        {/* Dark/Light Toggle */}
        <button
          style={{position:'fixed',top:20,right:28,zIndex:9,padding:6,borderRadius:24,border:'none',background:'#ea0089',color:'#fff',fontWeight:900,cursor:'pointer'}}
          onClick={()=>setDark(d=>!d)}> {dark ? '🌑' : '🌕'} </button>
        <Routes>
          <Route path="/" element={<LandingPage/>} />
          <Route path="/login" element={<LoginPage />}/>
          <Route path="/register" element={<RegisterPage/>}/>
          <Route path="/feed" element={<FeedPage/>}/>
          <Route path="/dashboard" element={<UserDashboardPage/>}/>
          <Route path="/admin" element={<AdminDashboardPage/>}/>
          <Route path="/profile/:id" element={<ProfilePage/>}/>
          <Route path="/marketplace" element={<MarketplacePage/>}/>
          <Route path="/messages" element={<MessagingPage/>}/>
          <Route path="/notifications" element={<NotificationsPage/>}/>
          <Route path="/upload" element={<VideoUploadPage/>}/>
          <Route path="*" element={<Navigate to="/"/>} />
        </Routes>
      </BrowserRouter>
    </ThemeProvider>
  );
}

export default App;
