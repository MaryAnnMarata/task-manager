# Personal Task Manager

**Project Code:** WST21-PM-2026-SF
**Student Names:** Mary Ann Marata C.
**Course & Year:** BSIT - 2nd Year, Section IT 2-Sec05
**Database Used:** Supabase (PostgreSQL)

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status (Pending / Completed)

## Built With

- **Framework:** Laravel 13
- **Language:** PHP 8.5
- **Database:** PostgreSQL (hosted on Supabase)
- **Templating Engine:** Blade
- **Styling:** Custom CSS
- **Icons:** Lucide

## How to Run This Project

Follow the steps below to get the project running on your local machine:

1. Clone this repository to your computer
2. Install the required dependencies:
   ```bash
   composer install
   ```
3. Duplicate `.env.example`, rename it to `.env`, and fill in your database connection details
4. Generate the application key:
   ```bash
   php artisan key:generate
   ```
5. Set up the database tables:
   ```bash
   php artisan migrate
   ```
6. Start the local development server:
   ```bash
   php artisan serve
   ```

Once the server is running, open your browser and go to `http://localhost:8000` to view the app.
