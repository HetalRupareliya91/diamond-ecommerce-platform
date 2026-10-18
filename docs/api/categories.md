# Categories API

Base path: /api/categories

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/categories | Paginated list (query: search, page, per_page) |
| POST | /api/categories | Create a record |
| GET | /api/categories/{id} | Show a single record |
| PUT | /api/categories/{id} | Update a record |
| DELETE | /api/categories/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| slug | string |
| description | text |
| is_active | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
