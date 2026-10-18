# Certificates API

Base path: /api/certificates

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/certificates | Paginated list (query: search, page, per_page) |
| POST | /api/certificates | Create a record |
| GET | /api/certificates/{id} | Show a single record |
| PUT | /api/certificates/{id} | Update a record |
| DELETE | /api/certificates/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| lab | string |
| certificate_number | string |
| issued_on | date |

Validation errors are returned with status 422 and an "errors" object keyed by field.
