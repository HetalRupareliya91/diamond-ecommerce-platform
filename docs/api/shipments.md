# Shipments API

Base path: /api/shipments

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/shipments | Paginated list (query: search, page, per_page) |
| POST | /api/shipments | Create a record |
| GET | /api/shipments/{id} | Show a single record |
| PUT | /api/shipments/{id} | Update a record |
| DELETE | /api/shipments/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| carrier | string |
| tracking_number | string |
| shipped_on | date |
| status | string |

Validation errors are returned with status 422 and an "errors" object keyed by field.
