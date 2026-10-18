# Diamond Clarities API

Base path: /api/diamond-clarities

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/diamond-clarities | Paginated list (query: search, page, per_page) |
| POST | /api/diamond-clarities | Create a record |
| GET | /api/diamond-clarities/{id} | Show a single record |
| PUT | /api/diamond-clarities/{id} | Update a record |
| DELETE | /api/diamond-clarities/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| grade | string |
| description | text |
| sort_order | integer |

Validation errors are returned with status 422 and an "errors" object keyed by field.
