import InventoryItemListPage from '../pages/InventoryItem/InventoryItemListPage';
import InventoryItemFormPage from '../pages/InventoryItem/InventoryItemFormPage';

const inventoryItemRoutes = [
  { path: '/inventory-items', element: <InventoryItemListPage /> },
  { path: '/inventory-items/new', element: <InventoryItemFormPage /> },
  { path: '/inventory-items/:id/edit', element: <InventoryItemFormPage /> },
];

export default inventoryItemRoutes;
