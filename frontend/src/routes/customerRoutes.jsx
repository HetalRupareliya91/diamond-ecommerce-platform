import CustomerListPage from '../pages/Customer/CustomerListPage';
import CustomerFormPage from '../pages/Customer/CustomerFormPage';

const customerRoutes = [
  { path: '/customers', element: <CustomerListPage /> },
  { path: '/customers/new', element: <CustomerFormPage /> },
  { path: '/customers/:id/edit', element: <CustomerFormPage /> },
];

export default customerRoutes;
