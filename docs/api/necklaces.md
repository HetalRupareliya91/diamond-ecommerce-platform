# Necklaces API

Base path: /api/necklaces

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/necklaces | Paginated list (query: search, page, per_page) |
| POST | /api/necklaces | Create a record |
| GET | /api/necklaces/{id} | Show a single record |
| PUT | /api/necklaces/{id} | Update a record |
| DELETE | /api/necklaces/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| sku | string |
| length_cm | decimal |
| price | decimal |

Validation errors are returned with status 422 and an "errors" object keyed by field.
