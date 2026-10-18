import RingSettingListPage from '../pages/RingSetting/RingSettingListPage';
import RingSettingFormPage from '../pages/RingSetting/RingSettingFormPage';

const ringSettingRoutes = [
  { path: '/ring-settings', element: <RingSettingListPage /> },
  { path: '/ring-settings/new', element: <RingSettingFormPage /> },
  { path: '/ring-settings/:id/edit', element: <RingSettingFormPage /> },
];

export default ringSettingRoutes;
