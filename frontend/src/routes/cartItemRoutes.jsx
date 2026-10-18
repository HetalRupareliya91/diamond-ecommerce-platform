import CartItemListPage from '../pages/CartItem/CartItemListPage';
import CartItemFormPage from '../pages/CartItem/CartItemFormPage';

const cartItemRoutes = [
  { path: '/cart-items', element: <CartItemListPage /> },
  { path: '/cart-items/new', element: <CartItemFormPage /> },
  { path: '/cart-items/:id/edit', element: <CartItemFormPage /> },
];

export default cartItemRoutes;
