import DiamondListPage from '../pages/Diamond/DiamondListPage';
import DiamondFormPage from '../pages/Diamond/DiamondFormPage';

const diamondRoutes = [
  { path: '/diamonds', element: <DiamondListPage /> },
  { path: '/diamonds/new', element: <DiamondFormPage /> },
  { path: '/diamonds/:id/edit', element: <DiamondFormPage /> },
];

export default diamondRoutes;
