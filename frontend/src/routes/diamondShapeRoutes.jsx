import DiamondShapeListPage from '../pages/DiamondShape/DiamondShapeListPage';
import DiamondShapeFormPage from '../pages/DiamondShape/DiamondShapeFormPage';

const diamondShapeRoutes = [
  { path: '/diamond-shapes', element: <DiamondShapeListPage /> },
  { path: '/diamond-shapes/new', element: <DiamondShapeFormPage /> },
  { path: '/diamond-shapes/:id/edit', element: <DiamondShapeFormPage /> },
];

export default diamondShapeRoutes;
