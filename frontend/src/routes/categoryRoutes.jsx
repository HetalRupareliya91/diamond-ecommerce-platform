import CategoryListPage from '../pages/Category/CategoryListPage';
import CategoryFormPage from '../pages/Category/CategoryFormPage';

const categoryRoutes = [
  { path: '/categories', element: <CategoryListPage /> },
  { path: '/categories/new', element: <CategoryFormPage /> },
  { path: '/categories/:id/edit', element: <CategoryFormPage /> },
];

export default categoryRoutes;
