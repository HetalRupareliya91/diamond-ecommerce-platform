import EarringListPage from '../pages/Earring/EarringListPage';
import EarringFormPage from '../pages/Earring/EarringFormPage';

const earringRoutes = [
  { path: '/earrings', element: <EarringListPage /> },
  { path: '/earrings/new', element: <EarringFormPage /> },
  { path: '/earrings/:id/edit', element: <EarringFormPage /> },
];

export default earringRoutes;
