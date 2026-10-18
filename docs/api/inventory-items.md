# Inventory API

Base path: /api/inventory-items

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/inventory-items | Paginated list (query: search, page, per_page) |
| POST | /api/inventory-items | Create a record |
| GET | /api/inventory-items/{id} | Show a single record |
| PUT | /api/inventory-items/{id} | Update a record |
| DELETE | /api/inventory-items/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| sku | string |
| quantity | integer |
| reorder_level | integer |

Validation errors are returned with status 422 and an "errors" object keyed by field.
