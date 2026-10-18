# Payments API

Base path: /api/payments

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/payments | Paginated list (query: search, page, per_page) |
| POST | /api/payments | Create a record |
| GET | /api/payments/{id} | Show a single record |
| PUT | /api/payments/{id} | Update a record |
| DELETE | /api/payments/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| gateway | string |
| reference | string |
| amount | decimal |
| status | string |

Validation errors are returned with status 422 and an "errors" object keyed by field.
