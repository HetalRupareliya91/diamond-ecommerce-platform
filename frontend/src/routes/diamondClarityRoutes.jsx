import DiamondClarityListPage from '../pages/DiamondClarity/DiamondClarityListPage';
import DiamondClarityFormPage from '../pages/DiamondClarity/DiamondClarityFormPage';

const diamondClarityRoutes = [
  { path: '/diamond-clarities', element: <DiamondClarityListPage /> },
  { path: '/diamond-clarities/new', element: <DiamondClarityFormPage /> },
  { path: '/diamond-clarities/:id/edit', element: <DiamondClarityFormPage /> },
];

export default diamondClarityRoutes;
