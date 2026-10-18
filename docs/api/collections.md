# Collections API

Base path: /api/collections

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/collections | Paginated list (query: search, page, per_page) |
| POST | /api/collections | Create a record |
| GET | /api/collections/{id} | Show a single record |
| PUT | /api/collections/{id} | Update a record |
| DELETE | /api/collections/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| slug | string |
| launch_date | date |
| is_featured | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
