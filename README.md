# NexaCRM

NexaCRM is a modern, high-performance Customer Relationship Management (CRM) application built on the Laravel framework. It provides a premium, responsive dark-themed workspace designed to streamline customer communications, manage proposals, track invoicing status, and process secure billing transactions via Stripe checkout.

---

## Key Features

- **Dynamic Workspace Dashboard**: real-time metrics showing total revenue, customer acquisition counts, pending proposal deals, open invoice amounts, and a live feed of recent transactions.
- **Client & Lead Management**: easily build, list, edit, and toggle the activation status of customers.
- **Proposal Workspace**: draft, send, edit, and review proposals to turn estimates into concrete contracts.
- **Automated Billing & Invoices**: issue invoices and trigger HTML transactional emails directly to the client's inbox.
- **Stripe Checkout Integration**: clients can securely pay outstanding invoices online via Stripe, automatically registering succeeded transactions back to the CRM database.
- **Ambient Dark Theme UI**: a stunning aesthetic layout leveraging soft radial background animations, modern typography (Inter), glassmorphism, responsive sidebar navigation, and subtle micro-interactions.

---

## Tech Stack

- **Backend**: Laravel 10.x & PHP 8.1+
- **Frontend Utilities**: Blade, Tailwind CSS, Vite
- **Database**: MySQL / SQLite
- **Security & Auth**: Laravel Breeze
- **Integrations**: Stripe Checkout API

---

## Installation & Setup

Follow these steps to run NexaCRM locally:

### 1. Prerequisites
Ensure you have the following installed on your machine:
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL database server (or SQLite)

### 2. Clone the Repository
```bash
git clone <repository-url> NexaCRM
cd NexaCRM
```

### 3. Install Dependencies
```bash
# Install PHP vendor packages
composer install

# Install node dependencies
npm install
```

### 4. Environment Configuration
Copy the `.env.example` file to create your own configuration file:
```bash
cp .env.example .env
```
Open `.env` and configure your database, mailer, and Stripe keys:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Nexa_CRM
DB_USERNAME=root
DB_PASSWORD=

# Mail Configurations (e.g. Mailtrap)
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password

# Stripe API Credentials
STRIPE_KEY=your_pk_test_stripe_key
STRIPE_SECRET=your_sk_test_stripe_secret
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Run Migrations
Run the database migrations to set up the schema:
```bash
php artisan migrate
```

### 7. Compile Assets & Run Local Server
Open two terminal windows/tabs to run the vite asset pipeline and the Laravel development server concurrently:

**Terminal 1 (Vite Dev Server)**:
```bash
npm run dev
```

**Terminal 2 (Artisan Local Server)**:
```bash
php artisan serve
```
The application will be accessible at [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Architecture and Database Relationships

The database is built on four core models to handle CRM workflows cleanly:

- **Customer**: Holds contact information (Name, Email, Phone) and active status.
- **Proposal**: Associated with a specific customer (`customer_id`). Tracks estimations and deal statuses (`draft`, `sent`, `accepted`, `rejected`).
- **Invoice**: Connected to a customer (`customer_id`). Tracks billing status (`paid`, `partial`, `unpaid`, `sent`).
- **Transaction**: Ties payments back to a customer (`customer_id`) and invoice (`invoice_id`). Tracks Stripe session states for verification.

---

## License

This project is licensed under the MIT License. Refer to the `LICENSE` file for details.
