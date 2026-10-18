import WeddingBandListPage from '../pages/WeddingBand/WeddingBandListPage';
import WeddingBandFormPage from '../pages/WeddingBand/WeddingBandFormPage';

const weddingBandRoutes = [
  { path: '/wedding-bands', element: <WeddingBandListPage /> },
  { path: '/wedding-bands/new', element: <WeddingBandFormPage /> },
  { path: '/wedding-bands/:id/edit', element: <WeddingBandFormPage /> },
];

export default weddingBandRoutes;
