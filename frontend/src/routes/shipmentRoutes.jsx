import ShipmentListPage from '../pages/Shipment/ShipmentListPage';
import ShipmentFormPage from '../pages/Shipment/ShipmentFormPage';

const shipmentRoutes = [
  { path: '/shipments', element: <ShipmentListPage /> },
  { path: '/shipments/new', element: <ShipmentFormPage /> },
  { path: '/shipments/:id/edit', element: <ShipmentFormPage /> },
];

export default shipmentRoutes;
