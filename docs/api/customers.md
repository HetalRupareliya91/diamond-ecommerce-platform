# Customers API

Base path: /api/customers

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/customers | Paginated list (query: search, page, per_page) |
| POST | /api/customers | Create a record |
| GET | /api/customers/{id} | Show a single record |
| PUT | /api/customers/{id} | Update a record |
| DELETE | /api/customers/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| email | string |
| phone | string |
| is_vip | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
