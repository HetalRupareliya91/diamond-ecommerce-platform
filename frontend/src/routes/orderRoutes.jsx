import OrderListPage from '../pages/Order/OrderListPage';
import OrderFormPage from '../pages/Order/OrderFormPage';

const orderRoutes = [
  { path: '/orders', element: <OrderListPage /> },
  { path: '/orders/new', element: <OrderFormPage /> },
  { path: '/orders/:id/edit', element: <OrderFormPage /> },
];

export default orderRoutes;
