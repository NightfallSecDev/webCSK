# Crooksec Technology - Premium Development Agency

A high-converting, ultra-premium landing page and custom CRM backend built for **Crooksec Technology**. The project explicitly focuses on generating leads using advanced UI/UX principles, modern CSS glassmorphism, 3D animations, and a secure PHP backend.

## Features

- **Premium UI/UX:** Built from scratch using raw HTML/CSS/JS with zero heavy frameworks. Features dynamic radial gradient mesh backgrounds, frosted glass (glassmorphism) cards, and smooth micro-animations.
- **Conversion Optimized:** Includes trust badges (Clutch, ISO 27001), strict privacy copy, dynamic client testimonial sliders, and a highly tuned lead-generation form.
- **Flat-File JSON Backend:** Includes a lightweight, zero-configuration PHP backend. It successfully captures and persists leads into a local JSON file (`backend/database.json`) without requiring MySQL, SQLite, or any database installations.
- **Secure Admin Panel:** A secure, session-protected dashboard (`admin/dashboard.php`) for the agency to review, manage, and read incoming lead requests and their detailed proposals.
- **Fully Responsive:** Extensive media queries ensure the layout and text proportionally scale across ultra-wide desktop monitors, tablets, and small mobile phone dimensions.

## Project Structure

```text
p1/
├── index.html           # Main landing page
├── styles.css          # Core styling, responsive grids, and animations
├── main.js             # Form fetch logic and scroll-reveal observers
├── backend/
│   ├── db.php          # JSON Database handler functions
│   ├── submit.php      # API endpoint for receiving lead POST requests
│   └── database.json   # Auto-generated flat-file storing the secure leads
└── admin/
    ├── index.php       # Admin login interface
    ├── auth.php        # Session authentication handler
    ├── dashboard.php   # Secure lead management dashboard
    └── logout.php      # Session destroyer
```

## Quick Start (Local Development)

Because the backend relies on PHP to handle the JSON lead storage, you must use a local PHP server rather than simply opening the HTML file dynamically in a browser.

1. Open your terminal in the root project directory.
2. Start the built-in PHP development server:
   ```bash
   php -S localhost:8000
   ```
3. Open your browser to the landing page: [http://localhost:8000/](http://localhost:8000/)
4. To view captured leads, go to the admin portal: [http://localhost:8000/admin/index.php](http://localhost:8000/admin/index.php)

> **Important:** Ensure your user environment has write permissions for the `/backend/` directory so the PHP server can successfully create `database.json`.

## Deployment Instructions (Ubuntu VPS / Nginx)

This project is incredibly fast to deploy to production since it requires no database configuration (like SQL tables or MySQL daemons). 

1. **Upload Files:** Move all files into the root public directory of your server (e.g., `/var/www/html/`).
2. **Set Web Server Ownership:** The web server daemon (Nginx/Apache) must own the backend folder to successfully read and write to `database.json`:
   ```bash
   sudo chown -R www-data:www-data /var/www/html/backend/
   sudo chmod -R 775 /var/www/html/backend/
   ```
3. **Change Admin Credentials:** Open `/admin/auth.php` and change the placeholder username (`admin`) and password (`password123`) to secure, private credentials before making the site public!
