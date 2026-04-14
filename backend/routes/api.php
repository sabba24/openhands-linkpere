<?php

use Illuminate\Support\Facades\Route;

// AUTH
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
Route::post('/forgot-password', [App\Http\Controllers\AuthController::class, 'forgotPassword']);

// Live/Battle/Podium
Route::post('/live/start', [\App\Http\Controllers\LiveController::class, 'start'])->middleware('auth:sanctum');
Route::post('/live/{id}/join', [\App\Http\Controllers\LiveController::class, 'join'])->middleware('auth:sanctum');
Route::post('/live/{id}/chat', [\App\Http\Controllers\LiveController::class, 'chat'])->middleware('auth:sanctum');
Route::post('/live/{id}/gift', [\App\Http\Controllers\LiveController::class, 'sendGift'])->middleware('auth:sanctum');
Route::post('/live/{id}/battle', [\App\Http\Controllers\LiveController::class, 'battle'])->middleware('auth:sanctum');
Route::post('/live/{id}/finish', [\App\Http\Controllers\LiveController::class, 'finish'])->middleware('auth:sanctum');
Route::get('/live/leaderboard', [\App\Http\Controllers\LiveController::class, 'leaderboard']);

// USERS & PROFILES
// Live Gifting
Route::post('/live/gift/send', [\App\Http\Controllers\LiveGiftController::class, 'send'])->middleware('auth:sanctum');
Route::get('/live/gift/list/{session_id}', [\App\Http\Controllers\LiveGiftController::class, 'gifts'])->middleware('auth:sanctum');
Route::get('/live/gift/balance', [\App\Http\Controllers\LiveGiftController::class, 'balance'])->middleware('auth:sanctum');
Route::get('/live/gift/transactions', [\App\Http\Controllers\LiveGiftController::class, 'transactions'])->middleware('auth:sanctum');

// Live Battle
Route::post('/live/battle/start', [\App\Http\Controllers\LiveBattleController::class, 'start'])->middleware('auth:sanctum');
Route::post('/live/battle/{id}/join', [\App\Http\Controllers\LiveBattleController::class, 'join'])->middleware('auth:sanctum');
Route::post('/live/battle/{id}/score', [\App\Http\Controllers\LiveBattleController::class, 'score'])->middleware('auth:sanctum');
Route::post('/live/battle/{id}/end', [\App\Http\Controllers\LiveBattleController::class, 'end'])->middleware('auth:sanctum');
Route::get('/live/battle/list', [\App\Http\Controllers\LiveBattleController::class, 'list']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'me']);
    Route::put('/user', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('/profiles/{id}', [App\Http\Controllers\UserController::class, 'profile']);
    
    // FEED & SOCIAL
    Route::get('/feed', [App\Http\Controllers\FeedController::class, 'feed']);
// Comment upgrades
Route::post('/comment/gift', [\App\Http\Controllers\CommentGiftController::class, 'send'])->middleware('auth:sanctum');
Route::post('/comment/gif', [\App\Http\Controllers\CommentGifController::class, 'send'])->middleware('auth:sanctum');
Route::post('/comment/voice', [\App\Http\Controllers\CommentVoiceNoteController::class, 'send'])->middleware('auth:sanctum');
Route::post('/comment/emoji', [\App\Http\Controllers\CommentEmojiReactionController::class, 'send'])->middleware('auth:sanctum');

    Route::post('/posts', [App\Http\Controllers\PostController::class, 'store']);
    Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show']);
    Route::post('/posts/{id}/like', [App\Http\Controllers\PostController::class, 'like']);
    Route::delete('/posts/{id}/like', [App\Http\Controllers\PostController::class, 'unlike']);
    Route::post('/posts/{id}/comments', [App\Http\Controllers\PostController::class, 'comment']);
    Route::post('/follow/{id}', [App\Http\Controllers\UserController::class, 'follow']);
    Route::delete('/follow/{id}', [App\Http\Controllers\UserController::class, 'unfollow']);
    Route::get('/notifications', [App\Http\Controllers\UserController::class, 'notifications']);
    // Messaging
    Route::get('/conversations', [App\Http\Controllers\MessageController::class, 'conversations']);
    Route::post('/messages', [App\Http\Controllers\MessageController::class, 'sendMessage']);
    Route::get('/messages/{id}', [App\Http\Controllers\MessageController::class, 'getMessages']);

    // Marketplace
    Route::get('/products', [App\Http\Controllers\MarketplaceController::class, 'products']);
    Route::get('/products/{id}', [App\Http\Controllers\MarketplaceController::class, 'product']);
    Route::post('/products', [App\Http\Controllers\MarketplaceController::class, 'createProduct'])->middleware('role:seller');

    Route::get('/categories', [App\Http\Controllers\MarketplaceController::class, 'categories']);
    Route::post('/cart', [App\Http\Controllers\MarketplaceController::class, 'addToCart']);
    Route::get('/cart', [App\Http\Controllers\MarketplaceController::class, 'viewCart']);
    Route::post('/wishlist', [App\Http\Controllers\MarketplaceController::class, 'addToWishlist']);
    Route::get('/wishlist', [App\Http\Controllers\MarketplaceController::class, 'wishlist']);
    Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'checkout']);
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index']);
    Route::get('/orders/{id}', [App\Http\Controllers\OrderController::class, 'show']);

    // Seller Dashboard
    Route::get('/seller/orders', [App\Http\Controllers\MarketplaceController::class, 'sellerOrders'])->middleware('role:seller');
    Route::get('/seller/products', [App\Http\Controllers\MarketplaceController::class, 'sellerProducts'])->middleware('role:seller');
});

// ADMIN
Route::middleware(['auth:sanctum','role:admin'])->group(function() {
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users']);
    Route::get('/admin/posts', [App\Http\Controllers\AdminController::class, 'posts']);
    Route::get('/admin/products', [App\Http\Controllers\AdminController::class, 'products']);
    Route::get('/admin/orders', [App\Http\Controllers\AdminController::class, 'orders']);
    Route::post('/admin/moderate/post/{id}', [App\Http\Controllers\AdminController::class, 'moderatePost']);
});
