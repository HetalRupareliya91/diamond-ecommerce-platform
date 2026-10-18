# Orders API

Base path: /api/orders

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/orders | Paginated list (query: search, page, per_page) |
| POST | /api/orders | Create a record |
| GET | /api/orders/{id} | Show a single record |
| PUT | /api/orders/{id} | Update a record |
| DELETE | /api/orders/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| order_number | string |
| status | string |
| total | decimal |
| placed_on | date |

Validation errors are returned with status 422 and an "errors" object keyed by field.
