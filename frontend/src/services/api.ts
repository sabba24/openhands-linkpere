import axios from 'axios';

export const api = axios.create({
  baseURL: '/api',
  timeout: 14000,
  headers: {
    'Content-Type': 'application/json',
  },
});

export const fetchFeed = async () => {
  // Will connect to backend, now simulate delay and sample
  // Replace this with: return (await api.get('/feed')).data;
  return new Promise(resolve => setTimeout(()=>resolve([
    { id: 1, url: '/videos/sample1.mp4', user: { name: 'AvaCreator', avatar: '/avatars/ava1.jpg' }, caption: 'Discover LINKPREE!', likes: 112, comments: [{user:'max',text:'🔥 love it!'},{user:'jane',text:'Cool'}], shares: 9, shop: true, product: {name: 'Viral Tee', price: 27, image: '/products/tee.jpg'}},
    { id: 2, url: '/videos/sample2.mp4', user: { name: 'MaxTrend', avatar: '/avatars/ava2.jpg' }, caption: 'Shop now in feed!', likes: 203, comments: [{user:'ava',text:'Great store'}], shares: 5, shop: true, product: {name: 'Creator Cap', price: 17, image: '/products/cap.jpg'}}
  ]),800));
};

export const likeVideo = async (id:number) => {
  // return api.post(`/videos/${id}/like`);
  return true;
};
export const addComment = async (id:number, comment:{user:string,text:string}) => {
  // return api.post(`/videos/${id}/comment`, comment);
  return true;
};
export const shareVideo = async (id:number) => {
  // return api.post(`/videos/${id}/share`);
  return true;
};
