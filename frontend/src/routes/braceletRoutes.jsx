import BraceletListPage from '../pages/Bracelet/BraceletListPage';
import BraceletFormPage from '../pages/Bracelet/BraceletFormPage';

const braceletRoutes = [
  { path: '/bracelets', element: <BraceletListPage /> },
  { path: '/bracelets/new', element: <BraceletFormPage /> },
  { path: '/bracelets/:id/edit', element: <BraceletFormPage /> },
];

export default braceletRoutes;
