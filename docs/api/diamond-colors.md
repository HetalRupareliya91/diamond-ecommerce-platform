# Diamond Colors API

Base path: /api/diamond-colors

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/diamond-colors | Paginated list (query: search, page, per_page) |
| POST | /api/diamond-colors | Create a record |
| GET | /api/diamond-colors/{id} | Show a single record |
| PUT | /api/diamond-colors/{id} | Update a record |
| DELETE | /api/diamond-colors/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| grade | string |
| description | text |
| sort_order | integer |

Validation errors are returned with status 422 and an "errors" object keyed by field.
