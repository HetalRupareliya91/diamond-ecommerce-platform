# Coupons API

Base path: /api/coupons

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/coupons | Paginated list (query: search, page, per_page) |
| POST | /api/coupons | Create a record |
| GET | /api/coupons/{id} | Show a single record |
| PUT | /api/coupons/{id} | Update a record |
| DELETE | /api/coupons/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| code | string |
| discount_percent | decimal |
| expires_on | date |
| is_active | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
