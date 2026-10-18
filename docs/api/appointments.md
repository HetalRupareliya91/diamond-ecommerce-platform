# Appointments API

Base path: /api/appointments

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/appointments | Paginated list (query: search, page, per_page) |
| POST | /api/appointments | Create a record |
| GET | /api/appointments/{id} | Show a single record |
| PUT | /api/appointments/{id} | Update a record |
| DELETE | /api/appointments/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| email | string |
| preferred_date | date |
| notes | text |

Validation errors are returned with status 422 and an "errors" object keyed by field.
