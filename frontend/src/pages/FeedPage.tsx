import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import { Box, CircularProgress, Alert } from "@mui/material";
import VideoCard from "../components/VideoCard";
import { useFeedStore } from '../state/feedStore';

const FeedPage: React.FC = () => {
  const { feed, loading, error, load } = useFeedStore();
  const swiperRef = React.useRef<any>(null);
  const [activeIdx, setActiveIdx] = React.useState(0);
  React.useEffect(() => { load(); }, [load]);

  // Auto play/pause video on scroll
  React.useEffect(() => {
    if (!feed.length) return;
    const videos = document.querySelectorAll('video');
    videos.forEach((vid, idx) => {
      if (idx === activeIdx) (vid as HTMLVideoElement).play();
      else (vid as HTMLVideoElement).pause();
    });
  }, [activeIdx, feed.length]);

  if (loading) return <Box sx={{display:'flex',justifyContent:'center',alignItems:'center',height:'100vh'}}><CircularProgress size={54} thickness={5} color="secondary"/></Box>;
  if (error) return <Alert severity="error">{error}</Alert>;
  if (!feed.length) return <Box p={6}>No videos found.</Box>;

  return (
    <Box sx={{height:'100vh',maxWidth:'500px',m:'0 auto'}}> {/* Responsive + mobile centered */}
      <Swiper 
        direction="vertical" 
        slidesPerView={1}
        style={{height: "100vh"}}
        mousewheel
        onSlideChange={swiper => setActiveIdx(swiper.activeIndex)}
        ref={swiperRef}
      >
        {feed.map((video, idx) => (
          <SwiperSlide key={video.id}>
            <VideoCard {...video} idx={idx} active={idx===activeIdx}/>
          </SwiperSlide>
        ))}
      </Swiper>
    </Box>
  );
};

export default FeedPage;
