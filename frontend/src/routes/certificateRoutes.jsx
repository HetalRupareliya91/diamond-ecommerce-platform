import CertificateListPage from '../pages/Certificate/CertificateListPage';
import CertificateFormPage from '../pages/Certificate/CertificateFormPage';

const certificateRoutes = [
  { path: '/certificates', element: <CertificateListPage /> },
  { path: '/certificates/new', element: <CertificateFormPage /> },
  { path: '/certificates/:id/edit', element: <CertificateFormPage /> },
];

export default certificateRoutes;
