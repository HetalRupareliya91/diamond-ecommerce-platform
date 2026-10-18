# Ring Settings API

Base path: /api/ring-settings

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/ring-settings | Paginated list (query: search, page, per_page) |
| POST | /api/ring-settings | Create a record |
| GET | /api/ring-settings/{id} | Show a single record |
| PUT | /api/ring-settings/{id} | Update a record |
| DELETE | /api/ring-settings/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| style | string |
| base_price | decimal |
| is_active | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
