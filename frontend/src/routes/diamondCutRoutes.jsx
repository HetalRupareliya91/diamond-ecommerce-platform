import DiamondCutListPage from '../pages/DiamondCut/DiamondCutListPage';
import DiamondCutFormPage from '../pages/DiamondCut/DiamondCutFormPage';

const diamondCutRoutes = [
  { path: '/diamond-cuts', element: <DiamondCutListPage /> },
  { path: '/diamond-cuts/new', element: <DiamondCutFormPage /> },
  { path: '/diamond-cuts/:id/edit', element: <DiamondCutFormPage /> },
];

export default diamondCutRoutes;
