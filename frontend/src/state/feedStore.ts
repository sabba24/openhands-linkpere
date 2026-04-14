import create from 'zustand';
import { fetchFeed, likeVideo, addComment, shareVideo } from '../services/api';

export interface User { name: string; avatar: string }
export interface Product { name: string; price: number; image: string }
export interface Comment { user: string; text: string }
export interface VideoData {
  id: number;
  url: string;
  user: User;
  caption: string;
  likes: number;
  comments: Comment[];
  shares: number;
  shop?: boolean;
  product?: Product;
}

interface FeedState {
  feed: VideoData[];
  loading: boolean;
  error: string | null;
  load: ()=>Promise<void>;
  like: (id:number)=>Promise<void>;
  addComment: (id:number,comment:Comment)=>Promise<void>;
  share: (id:number)=>Promise<void>;
}

export const useFeedStore = create<FeedState>((set, get) => ({
  feed: [],
  loading: false,
  error: null,
  load: async () => {
    set({loading:true,error:null});
    try {
      const res = await fetchFeed();
      set({ feed: res as VideoData[], loading: false });
    } catch (e:any) {
      set({ error: e.message, loading: false });
    }
  },
  like: async (id:number) => {
    await likeVideo(id);
    set(s => ({feed: s.feed.map(v => v.id === id ? { ...v, likes: v.likes + 1 } : v)}));
  },
  addComment: async (id,comment) => {
    await addComment(id,comment);
    set(s => ({feed: s.feed.map(v => v.id===id?{...v,comments:[...v.comments,comment]}:v)}));
  },
  share: async (id:number) => {
    await shareVideo(id);
    set(s => ({feed: s.feed.map(v => v.id===id?{...v,shares:v.shares+1}:v)}));
  }
}));
