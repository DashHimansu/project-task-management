<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# Project & Task Management App (Laravel)

This is Laravel app I built to manage **Projects** and **Tasks**. The goal was to have something practical with **CRUD operations**, **task status tracking**, **file uploads**, and **soft deletes**, plus a **REST API** for API integration.  

It’s built using **Laravel Breeze** for authentication, **Eloquent relationships** for projects & tasks, and includes features like **Excel export**, **task filtering**, and more.  

---

## What You Can Do Here

- Sign up/login and manage your projects and tasks  
- Create, edit, delete projects and tasks  
- Track task status: `pending`, `in_progress`, `completed`  
- Upload attachments for tasks (images or PDFs, max 2MB)  
- Soft delete tasks and restore them if needed  
- Filter tasks by **project**, **status**, or **assigned person**  
- Export your tasks to Excel for reporting  
- Access data via REST APIs (all JSON responses)

---

## Getting Started

### 1. Clone and Install

```bash
git clone https://github.com/DashHimansu/project-task-management.git
cd project-task-management
composer install
npm install && npm run dev

2. Setup Environment
cp .env.example .env
php artisan key:generate

Configure your database in .env and run migrations & seeders:

php artisan migrate --seed
php artisan storage:link

Start the app:

php artisan serve
 your app is live at http://127.0.0.1:8000.

Database & Relationships

Project has many Tasks

Task belongs to a Project

Tasks have title, description, assigned_to, status, attachment, and due_date

Soft deletes are enabled for tasks, so nothing is ever truly lost unless you really want it gone.

Web Routes

Projects: /projects for (list) → , /create, /edit, /delete

Tasks: /tasks for (list) → /create, /edit, /soft delete

Export Tasks: /tasks/export → download Excel


Inline Status Updates

No need to open a task to update its status.
There’s a dropdown in the task table that lets you update status instantly — just change it and the update is saved.

File Uploads

Task attachments can be images (jpg/jpeg/png) or PDFs

Max size: 2MB

Stored in: storage/app/public/tasks

Access via /storage/tasks/<filename>

API Routes

I also built a JSON API so you can integrate this app anywhere:

Endpoint	Method	Description
/api/projects	GET	List all projects
/api/tasks	GET	List all tasks
/api/tasks/project/{id}	GET	Get tasks for a project
/api/tasks/{id}/status	PUT	Update task status

Example JSON for a task:

{
  "id": 1,
  "title": "Design Landing Page",
  "project_id": 1,
  "assigned_to": "John Doe",
  "status": "pending",
  "attachment": "tasks/file.pdf",
  "due_date": "2026-03-05",
  "created_at": "2026-02-26T10:00:00",
  "updated_at": "2026-02-26T10:00:00"
}
Extras

Excel export powered by Maatwebsite/Excel

Filter tasks by project, status, or assigned person

Authenticated routes via Laravel Breeze
