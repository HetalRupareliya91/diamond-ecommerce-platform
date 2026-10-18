import AppointmentListPage from '../pages/Appointment/AppointmentListPage';
import AppointmentFormPage from '../pages/Appointment/AppointmentFormPage';

const appointmentRoutes = [
  { path: '/appointments', element: <AppointmentListPage /> },
  { path: '/appointments/new', element: <AppointmentFormPage /> },
  { path: '/appointments/:id/edit', element: <AppointmentFormPage /> },
];

export default appointmentRoutes;
