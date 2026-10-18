import MetalListPage from '../pages/Metal/MetalListPage';
import MetalFormPage from '../pages/Metal/MetalFormPage';

const metalRoutes = [
  { path: '/metals', element: <MetalListPage /> },
  { path: '/metals/new', element: <MetalFormPage /> },
  { path: '/metals/:id/edit', element: <MetalFormPage /> },
];

export default metalRoutes;
