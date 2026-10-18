import EngagementRingListPage from '../pages/EngagementRing/EngagementRingListPage';
import EngagementRingFormPage from '../pages/EngagementRing/EngagementRingFormPage';

const engagementRingRoutes = [
  { path: '/engagement-rings', element: <EngagementRingListPage /> },
  { path: '/engagement-rings/new', element: <EngagementRingFormPage /> },
  { path: '/engagement-rings/:id/edit', element: <EngagementRingFormPage /> },
];

export default engagementRingRoutes;
