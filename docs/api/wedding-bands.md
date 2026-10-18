# Wedding Bands API

Base path: /api/wedding-bands

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | /api/wedding-bands | Paginated list (query: search, page, per_page) |
| POST | /api/wedding-bands | Create a record |
| GET | /api/wedding-bands/{id} | Show a single record |
| PUT | /api/wedding-bands/{id} | Update a record |
| DELETE | /api/wedding-bands/{id} | Delete a record |

## Fields

| Field | Type |
|-------|------|
| name | string |
| sku | string |
| width_mm | decimal |
| price | decimal |

Validation errors are returned with status 422 and an "errors" object keyed by field.
