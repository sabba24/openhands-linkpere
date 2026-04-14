import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import { Box } from "@mui/material";
import VideoCard from "../components/VideoCard";

const fakeVideos = [
  { id: 1, url: "/videos/sample1.mp4", user: { name: "AvaCreator", avatar: "/avatars/ava1.jpg" }, caption: "Discover LINKPREE!", likes: 112, comments: 45, shares: 9, shop: true, product: {name: "Viral Tee", price: 27, image: "/products/tee.jpg"}},
  { id: 2, url: "/videos/sample2.mp4", user: { name: "MaxTrend", avatar: "/avatars/ava2.jpg" }, caption: "Shop now in feed!", likes: 203, comments: 31, shares: 5, shop: true, product: {name: "Creator Cap", price: 17, image: "/products/cap.jpg"}}
];

const FeedPage = () => (
  <Box sx={{height:'100vh'}}>
    <Swiper 
      direction="vertical" 
      slidesPerView={1}
      style={{height: "100vh"}}
      mousewheel
    >
      {fakeVideos.map((video) => (
        <SwiperSlide key={video.id}>
          <VideoCard {...video} />
        </SwiperSlide>
      ))}
    </Swiper>
  </Box>
);

export default FeedPage;
