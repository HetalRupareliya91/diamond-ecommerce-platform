# Earrings API

Base path: /api/earrings

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/earrings | Paginated list (query: search, page, per_page) |
| POST | /api/earrings | Create a record |
| GET | /api/earrings/{id} | Show a single record |
| PUT | /api/earrings/{id} | Update a record |
| DELETE | /api/earrings/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| sku | string |
| style | string |
| price | decimal |

Validation errors are returned with status 422 and an "errors" object keyed by field.
