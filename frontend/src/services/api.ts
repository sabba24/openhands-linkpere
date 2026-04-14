import axios from 'axios';

const API_BASE = process.env.REACT_APP_API_URL || 'http://localhost:8000/api';

export const api = axios.create({
  baseURL: API_BASE,
  withCredentials: true,
});

export const login = (credentials: {email: string; password: string}) => api.post('/login', credentials);
export const register = (data: any) => api.post('/register', data);
export const logout = () => api.post('/logout');
export const forgotPassword = (email: string) => api.post('/forgot-password', {email});
export const getCurrentUser = () => api.get('/user');
export const updateProfile = (data: any) => api.put('/user', data);
export const fetchProfile = (id: string) => api.get(`/profiles/${id}`);

export const fetchFeed = (params: any) => api.get('/feed', { params });
export const createPost = (data: any) => api.post('/posts', data);
export const getPost = (id: string) => api.get(`/posts/${id}`);
export const likePost = (id: string) => api.post(`/posts/${id}/like`);
export const unlikePost = (id: string) => api.delete(`/posts/${id}/like`);
export const commentPost = (id: string, comment: any) => api.post(`/posts/${id}/comments`, comment);
export const followUser = (id: string) => api.post(`/follow/${id}`);
export const unfollowUser = (id: string) => api.delete(`/follow/${id}`);
export const fetchNotifications = () => api.get('/notifications');

export const getConversations = () => api.get('/conversations');
export const sendMessage = (data: any) => api.post('/messages', data);
export const getMessages = (id: string) => api.get(`/messages/${id}`);

export const getProducts = (params: any={}) => api.get('/products', { params });
export const getProduct = (id: string) => api.get(`/products/${id}`);
export const createProduct = (data: any) => api.post('/products', data);
export const getCategories = () => api.get('/categories');
export const addToCart = (data: any) => api.post('/cart', data);
export const viewCart = () => api.get('/cart');
export const addToWishlist = (data: any) => api.post('/wishlist', data);
export const getWishlist = () => api.get('/wishlist');
export const checkout = (data: any) => api.post('/checkout', data);
export const getOrders = () => api.get('/orders');
export const getOrder = (id: string) => api.get(`/orders/${id}`);
export const getSellerOrders = () => api.get('/seller/orders');
export const getSellerProducts = () => api.get('/seller/products');

export const adminGetUsers = () => api.get('/admin/users');
export const adminGetPosts = () => api.get('/admin/posts');
export const adminGetProducts = () => api.get('/admin/products');
export const adminGetOrders = () => api.get('/admin/orders');
export const adminModeratePost = (id: string) => api.post(`/admin/moderate/post/${id}`);
export const adminGetFlaggedUsers = () => api.get('/admin/moderation/flagged-users');
export const adminReviewFlag = (id:string) => api.put(`/admin/moderation/${id}/review`);
export const adminApproveFlag = (id:string) => api.put(`/admin/moderation/${id}/approve`);
export const adminBanFlag = (id:string) => api.put(`/admin/moderation/${id}/ban`);
export const adminGetAds = () => api.get('/admin/ads/campaigns');
export const adminApproveAd = (id:string) => api.put(`/admin/ads/${id}/approve`);
export const adminRejectAd = (id:string) => api.put(`/admin/ads/${id}/reject`);
export const adminPauseAd = (id:string) => api.put(`/admin/ads/${id}/pause`);
export const adminGetAlgorithmConfig = () => api.get('/admin/algorithm/config');
export const adminSetAlgorithmConfig = (data:any) => api.post('/admin/algorithm/config', data);
export const adminGetStorageProviders = () => api.get('/admin/storage/providers');
export const adminSetStorageProvider = (disk:string) => api.post('/admin/storage/set-provider', { disk });

