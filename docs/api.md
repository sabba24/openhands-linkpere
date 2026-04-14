# LINKPREE API Reference

All routes are prefixed with `/api`.

## Auth
- `POST /login`
- `POST /register`
- `POST /logout`
- `GET /user`

## Feed
- `GET /feed`
- `GET /posts/{id}`
- `POST /posts`
- `POST /posts/{id}/like`
- `POST /posts/{id}/comments`

## Profile
- `GET /profiles/{id}`
- `PUT /user`

## Marketplace
- `GET /products`
- `GET /products/{id}`
- `POST /cart`
- `GET /cart`
- `POST /wishlist`
- `GET /wishlist`
- `POST /checkout`
- `GET /orders`

## Messaging
- `GET /conversations`
- `POST /messages`
- `GET /messages/{id}`

## Notifications
- `GET /notifications`

## Admin
- `GET /admin/users`
- `GET /admin/posts`
- `GET /admin/orders`
- `POST /admin/moderate/post/{id}`

See backend/routes/api.php for full RESTful details.
