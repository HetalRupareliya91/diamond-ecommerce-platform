# Cart Items API

Base path: /api/cart-items

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/cart-items | Paginated list (query: search, page, per_page) |
| POST | /api/cart-items | Create a record |
| GET | /api/cart-items/{id} | Show a single record |
| PUT | /api/cart-items/{id} | Update a record |
| DELETE | /api/cart-items/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| product_sku | string |
| quantity | integer |
| unit_price | decimal |

Validation errors are returned with status 422 and an "errors" object keyed by field.
