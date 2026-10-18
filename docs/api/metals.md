# Metals API

Base path: /api/metals

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/metals | Paginated list (query: search, page, per_page) |
| POST | /api/metals | Create a record |
| GET | /api/metals/{id} | Show a single record |
| PUT | /api/metals/{id} | Update a record |
| DELETE | /api/metals/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| purity | string |
| price_per_gram | decimal |
| is_active | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
