import ReviewListPage from '../pages/Review/ReviewListPage';
import ReviewFormPage from '../pages/Review/ReviewFormPage';

const reviewRoutes = [
  { path: '/reviews', element: <ReviewListPage /> },
  { path: '/reviews/new', element: <ReviewFormPage /> },
  { path: '/reviews/:id/edit', element: <ReviewFormPage /> },
];

export default reviewRoutes;
