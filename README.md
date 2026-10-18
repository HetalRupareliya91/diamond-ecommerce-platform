# Diamond E-Commerce Platform

A complete online store for certified diamonds and fine jewellery.

| Layer    | Stack |
|----------|-------|
| Frontend | React 18, React Router 6, Axios, Vite, Vitest |
| Backend  | Laravel 11 (REST API), Eloquent, PHPUnit |
| Database | MySQL / SQLite |

## Modules

- **Diamonds** (Catalog) - /api/diamonds
- **Diamond Shapes** (Catalog) - /api/diamond-shapes
- **Diamond Cuts** (Catalog) - /api/diamond-cuts
- **Diamond Colors** (Catalog) - /api/diamond-colors
- **Diamond Clarities** (Catalog) - /api/diamond-clarities
- **Certificates** (Catalog) - /api/certificates
- **Metals** (Catalog) - /api/metals
- **Ring Settings** (Catalog) - /api/ring-settings
- **Engagement Rings** (Catalog) - /api/engagement-rings
- **Wedding Bands** (Catalog) - /api/wedding-bands
- **Necklaces** (Catalog) - /api/necklaces
- **Earrings** (Catalog) - /api/earrings
- **Bracelets** (Catalog) - /api/bracelets
- **Categories** (Catalog) - /api/categories
- **Collections** (Catalog) - /api/collections
- **Cart Items** (Sales) - /api/cart-items
- **Orders** (Sales) - /api/orders
- **Payments** (Sales) - /api/payments
- **Coupons** (Sales) - /api/coupons
- **Reviews** (Sales) - /api/reviews
- **Wishlists** (Sales) - /api/wishlists
- **Customers** (Customers) - /api/customers
- **Addresses** (Customers) - /api/addresses
- **Shipments** (Operations) - /api/shipments
- **Inventory** (Operations) - /api/inventory-items
- **Appointments** (Operations) - /api/appointments

## Getting started

### Backend

    cd backend
    composer install
    cp .env.example .env
    php artisan key:generate
    touch database/database.sqlite
    php artisan migrate --seed
    php artisan serve

### Frontend

    cd frontend
    npm install
    npm run dev

The frontend dev server proxies /api to http://localhost:8000.

### Tests

    cd backend && php artisan test
    cd frontend && npm test

## Team

- Hetalrupareliya91 (owner)
- rajsingh10
- divyeshfablead
- fableadtechnolab
