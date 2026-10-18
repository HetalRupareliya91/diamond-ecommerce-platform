import AddressListPage from '../pages/Address/AddressListPage';
import AddressFormPage from '../pages/Address/AddressFormPage';

const addressRoutes = [
  { path: '/addresses', element: <AddressListPage /> },
  { path: '/addresses/new', element: <AddressFormPage /> },
  { path: '/addresses/:id/edit', element: <AddressFormPage /> },
];

export default addressRoutes;
