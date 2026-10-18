import PaymentListPage from '../pages/Payment/PaymentListPage';
import PaymentFormPage from '../pages/Payment/PaymentFormPage';

const paymentRoutes = [
  { path: '/payments', element: <PaymentListPage /> },
  { path: '/payments/new', element: <PaymentFormPage /> },
  { path: '/payments/:id/edit', element: <PaymentFormPage /> },
];

export default paymentRoutes;
