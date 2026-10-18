# Diamond Cuts API

Base path: /api/diamond-cuts

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/diamond-cuts | Paginated list (query: search, page, per_page) |
| POST | /api/diamond-cuts | Create a record |
| GET | /api/diamond-cuts/{id} | Show a single record |
| PUT | /api/diamond-cuts/{id} | Update a record |
| DELETE | /api/diamond-cuts/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| grade | string |
| description | text |
| sort_order | integer |

Validation errors are returned with status 422 and an "errors" object keyed by field.
