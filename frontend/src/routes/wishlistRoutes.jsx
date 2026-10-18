import WishlistListPage from '../pages/Wishlist/WishlistListPage';
import WishlistFormPage from '../pages/Wishlist/WishlistFormPage';

const wishlistRoutes = [
  { path: '/wishlists', element: <WishlistListPage /> },
  { path: '/wishlists/new', element: <WishlistFormPage /> },
  { path: '/wishlists/:id/edit', element: <WishlistFormPage /> },
];

export default wishlistRoutes;
