# Wishlists API

Base path: /api/wishlists

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/wishlists | Paginated list (query: search, page, per_page) |
| POST | /api/wishlists | Create a record |
| GET | /api/wishlists/{id} | Show a single record |
| PUT | /api/wishlists/{id} | Update a record |
| DELETE | /api/wishlists/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| product_sku | string |
| notes | text |

Validation errors are returned with status 422 and an "errors" object keyed by field.
