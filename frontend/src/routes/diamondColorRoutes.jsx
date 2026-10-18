import DiamondColorListPage from '../pages/DiamondColor/DiamondColorListPage';
import DiamondColorFormPage from '../pages/DiamondColor/DiamondColorFormPage';

const diamondColorRoutes = [
  { path: '/diamond-colors', element: <DiamondColorListPage /> },
  { path: '/diamond-colors/new', element: <DiamondColorFormPage /> },
  { path: '/diamond-colors/:id/edit', element: <DiamondColorFormPage /> },
];

export default diamondColorRoutes;
