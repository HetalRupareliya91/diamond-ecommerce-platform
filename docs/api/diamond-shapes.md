# Diamond Shapes API

Base path: /api/diamond-shapes

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/diamond-shapes | Paginated list (query: search, page, per_page) |
| POST | /api/diamond-shapes | Create a record |
| GET | /api/diamond-shapes/{id} | Show a single record |
| PUT | /api/diamond-shapes/{id} | Update a record |
| DELETE | /api/diamond-shapes/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| code | string |
| sort_order | integer |
| is_active | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
