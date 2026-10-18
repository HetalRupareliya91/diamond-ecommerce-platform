# Engagement Rings API

Base path: /api/engagement-rings

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/engagement-rings | Paginated list (query: search, page, per_page) |
| POST | /api/engagement-rings | Create a record |
| GET | /api/engagement-rings/{id} | Show a single record |
| PUT | /api/engagement-rings/{id} | Update a record |
| DELETE | /api/engagement-rings/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| sku | string |
| metal | string |
| price | decimal |
| is_active | boolean |

Validation errors are returned with status 422 and an "errors" object keyed by field.
