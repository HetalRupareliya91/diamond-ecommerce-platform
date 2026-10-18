import NecklaceListPage from '../pages/Necklace/NecklaceListPage';
import NecklaceFormPage from '../pages/Necklace/NecklaceFormPage';

const necklaceRoutes = [
  { path: '/necklaces', element: <NecklaceListPage /> },
  { path: '/necklaces/new', element: <NecklaceFormPage /> },
  { path: '/necklaces/:id/edit', element: <NecklaceFormPage /> },
];

export default necklaceRoutes;
