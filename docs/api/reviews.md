# Reviews API

Base path: /api/reviews

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/reviews | Paginated list (query: search, page, per_page) |
| POST | /api/reviews | Create a record |
| GET | /api/reviews/{id} | Show a single record |
| PUT | /api/reviews/{id} | Update a record |
| DELETE | /api/reviews/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| rating | integer |
| comment | text |
| is_approved | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
