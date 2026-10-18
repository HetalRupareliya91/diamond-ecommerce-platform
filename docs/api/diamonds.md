# Diamonds API

Base path: /api/diamonds

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/diamonds | Paginated list (query: search, page, per_page) |
| POST | /api/diamonds | Create a record |
| GET | /api/diamonds/{id} | Show a single record |
| PUT | /api/diamonds/{id} | Update a record |
| DELETE | /api/diamonds/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| sku | string |
| carat | decimal |
| cut | string |
| color | string |
| clarity | string |
| price | decimal |
| is_active | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
