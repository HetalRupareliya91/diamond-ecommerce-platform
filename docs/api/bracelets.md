# Bracelets API

Base path: /api/bracelets

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/bracelets | Paginated list (query: search, page, per_page) |
| POST | /api/bracelets | Create a record |
| GET | /api/bracelets/{id} | Show a single record |
| PUT | /api/bracelets/{id} | Update a record |
| DELETE | /api/bracelets/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| sku | string |
| length_cm | decimal |
| price | decimal |

Validation errors are returned with status 422 and an "errors" object keyed by field.
