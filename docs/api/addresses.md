# Addresses API

Base path: /api/addresses

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/addresses | Paginated list (query: search, page, per_page) |
| POST | /api/addresses | Create a record |
| GET | /api/addresses/{id} | Show a single record |
| PUT | /api/addresses/{id} | Update a record |
| DELETE | /api/addresses/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| line1 | string |
| city | string |
| postal_code | string |
| country | string |

Validation errors are returned with status 422 and an "errors" object keyed by field.
