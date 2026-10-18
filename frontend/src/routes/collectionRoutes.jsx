import CollectionListPage from '../pages/Collection/CollectionListPage';
import CollectionFormPage from '../pages/Collection/CollectionFormPage';

const collectionRoutes = [
  { path: '/collections', element: <CollectionListPage /> },
  { path: '/collections/new', element: <CollectionFormPage /> },
  { path: '/collections/:id/edit', element: <CollectionFormPage /> },
];

export default collectionRoutes;
