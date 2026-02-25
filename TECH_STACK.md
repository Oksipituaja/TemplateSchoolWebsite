# 🛠️ Complete Technology Stack

**Last Updated**: February 22, 2026  
**Version**: 1.0.0  
**Framework**: Laravel 12

---

## 📋 Overview

SD Bangsri School Portal menggunakan modern web technologies stack yang robust, scalable, dan production-ready:

```
┌─────────────────────────────────────────────────────────────────┐
│                  SD BANGSRI SCHOOL PORTAL                       │
├─────────────────────────────────────────────────────────────────┤
│ FRONTEND LAYER (TALL Stack)                                     │
│ ├─ Tailwind CSS v4.0 (Utility-First CSS)                       │
│ ├─ Alpine.js (Lightweight JavaScript Framework)                │
│ ├─ Laravel Livewire v3 (Reactive Components)                   │
│ └─ Blade Templates (Server-Side Rendering)                      │
├─────────────────────────────────────────────────────────────────┤
│ BACKEND LAYER                                                    │
│ ├─ Laravel Framework 12 (Core)                                  │
│ ├─ Laravel Breeze (Authentication & Authorization)              │
│ ├─ Eloquent ORM (Database Abstraction)                          │
│ ├─ Laravel Migrations (Schema Management)                       │
│ └─ Queue System (Asynchronous Processing)                       │
├─────────────────────────────────────────────────────────────────┤
│ ADMIN PANEL LAYER                                                │
│ └─ Filament v3 (CRUD Management, Tables, Forms)                │
├─────────────────────────────────────────────────────────────────┤
│ PERFORMANCE & CACHING LAYER                                      │
│ ├─ Redis/Memcached (Database Caching)                          │
│ ├─ Laravel Cache Facade (Unified Caching Interface)            │
│ ├─ Query Result Caching (Eloquent Caching)                     │
│ └─ Laravel Octane (Application Server)                          │
├─────────────────────────────────────────────────────────────────┤
│ DATABASE LAYER                                                   │
│ ├─ SQLite (Development)                                         │
│ └─ MySQL 8+ (Production)                                        │
└─────────────────────────────────────────────────────────────────┘
```

---

## 🎨 Frontend Technologies (TALL Stack)

### Tailwind CSS v4.0
**Purpose**: Utility-first CSS framework for rapid UI development

```bash
# Build CSS with Vite
npm run build

# Development with hot reload
npm run dev
```

**Features**:
- ✅ Responsive design system
- ✅ Dark mode support
- ✅ Custom theme configuration
- ✅ Performance optimized (Vite integration)

**Configuration**: `tailwind.config.js`

**Custom Theme Colors**:
```javascript
colors: {
    eduBlue: {
        main: '#1E40AF',
        light: '#3B82F6',
        dark: '#1E3A8A'
    },
    sunJoy: '#FCD34D',
    careGreen: '#10B981',
    softBlack: '#1F2937'
}
```

---

### Alpine.js
**Purpose**: Lightweight JavaScript framework for interactive components

**Usage**:
```html
<!-- Example: Toggle component -->
<div x-data="{ open: false }">
    <button @click="open = !open">Toggle</button>
    <div x-show="open">Content</div>
</div>
```

**Key Features**:
- ✅ Minimal JavaScript bundle size (~15KB)
- ✅ Reactive data binding
- ✅ Event listeners & DOM manipulation
- ✅ Works perfectly with Livewire

---

### Livewire v3
**Purpose**: Full-stack reactive components without leaving PHP

**Component Structure**:
```
app/Livewire/
├── Pages/          # Page components (routable)
│   ├── Home.php
│   ├── Gallery.php
│   └── Teachers.php
└── Components/     # Reusable components
    ├── Modal.php
    └── Filter.php
```

**Features**:
- ✅ Real-time component updates
- ✅ No JavaScript required
- ✅ Seamless integration with Laravel
- ✅ Data validation & error handling
- ✅ File uploads
- ✅ Pagination & lazy loading

**Example Component**:
```php
#[Layout('components.layouts.app')]
class Gallery extends Component
{
    public function render()
    {
        return view('livewire.pages.gallery', [
            'galleries' => Gallery::paginate(12)
        ]);
    }
}
```

---

### Blade Templates
**Purpose**: Laravel's templating engine with server-side rendering

**Features**:
- ✅ Directives for control structures
- ✅ Component reusability
- ✅ Template inheritance with layouts
- ✅ PHP compatibility

---

## 🔐 Authentication & Authorization (Laravel Breeze)

### What is Laravel Breeze?
Minimal head-start for Laravel authentication scaffold

**Installed Features**:
```bash
php artisan breeze:install livewire
```

**Provides**:
- ✅ User registration page
- ✅ Login page with "Remember Me"
- ✅ Password reset functionality
- ✅ Email verification (optional)
- ✅ Built with Tailwind CSS + Livewire
- ✅ Password hashing with bcrypt

**Database Schema**:
```sql
CREATE TABLE users (
    id BIGINT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    email_verified_at TIMESTAMP,
    password VARCHAR(255),
    two_factor_secret LONGTEXT,
    two_factor_recovery_codes LONGTEXT,
    remember_token VARCHAR(100),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

**Routes**:
```
/register      - User registration
/login         - User login
/forgot-password - Password reset request
/reset-password/{token} - Password reset
/dashboard     - Authenticated users dashboard
/profile       - User profile settings
```

---

## 🎛️ Admin Panel (Filament v3)

### What is Filament?
A collection of full-featured, customizable TALL stack admin components

**Access**: `http://localhost:8000/admin`

### Admin Panel Structure

```
app/Filament/
├── Resources/
│   ├── UserResource.php
│   ├── TeacherResource.php
│   ├── NewsResource.php
│   ├── GalleryResource.php
│   ├── AgendaResource.php
│   ├── FacilityResource.php
│   └── RegistrationResource.php
└── Pages/
    ├── Dashboard.php
    └── CreateUser.php
```

### Available Resources

#### 1. **Teacher Management**
- ✅ Create/Read/Update/Delete (CRUD)
- ✅ Soft deletes
- ✅ Bulk actions
- ✅ Export to CSV/Excel
- ✅ Search & filter
- ✅ Image upload for photos

**Fields**:
```php
name, subject, bio, experience, email, phone, image_url
```

#### 2. **News Management**
- ✅ Rich text editor (TinyMCE/Quill)
- ✅ Featured image upload
- ✅ Publish scheduling
- ✅ Categories
- ✅ SEO meta tags

**Fields**:
```php
title, slug, content, featured_image, category, status, published_at
```

#### 3. **Gallery Management**
- ✅ Multiple image uploads
- ✅ Category organization
- ✅ Image tagging
- ✅ Drag-to-reorder

**Fields**:
```php
title, description, image, category, order
```

#### 4. **Agenda/Events Management**
- ✅ Date/time picker
- ✅ Location field
- ✅ Event status (Upcoming/Ongoing/Completed)
- ✅ Event reminders

**Fields**:
```php
title, description, start_date, end_date, location, status
```

#### 5. **Facilities Management**
- ✅ Feature management
- ✅ Image gallery
- ✅ Location tracking

**Fields**:
```php
name, description, image, quantity, status
```

#### 6. **Student Registrations (PPDB)**
- ✅ Registration form data viewing
- ✅ Status tracking (Submitted/Reviewed/Accepted)
- ✅ Document uploads
- ✅ Export registration data

**Fields**:
```php
student_name, parent_name, email, phone, address, documents
```

### Filament Commands

```bash
# Create a new resource
php artisan make:filament-resource Teacher

# Create resource with all features
php artisan make:filament-resource Teacher --generate

# Create a custom page
php artisan make:filament-page Dashboard

# Publish Filament assets
php artisan filament:install filament/admin
```

---

## ⚡ Performance & Caching

### Redis/Memcached Integration

**Setup Redis**:
```bash
# In .env
CACHE_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

**Cache Usage in Code**:
```php
// Cache query results for 1 hour
$teachers = Cache::remember('teachers.list', 3600, function () {
    return Teacher::all();
});

// Store value in cache
Cache::put('key', 'value', 60);

// Get from cache with fallback
$value = Cache::get('key', 'default');

// Clear specific cache
Cache::forget('teachers.list');

// Clear all cache
Cache::flush();
```

### Database Query Caching

```php
// In Repository or Service class
public function getAllTeachers()
{
    return Cache::remember('teachers.all', 3600, function () {
        return Teacher::with('subject')
            ->where('status', 'active')
            ->get();
    });
}
```

### Cache Invalidation Strategies

```php
// Invalidate on create
protected static function booted()
{
    static::created(function ($model) {
        Cache::forget('teachers.all');
    });
    
    static::updated(function ($model) {
        Cache::forget('teachers.all');
    });
}
```

### Cache Commands

```bash
# Clear all application cache
php artisan cache:clear

# Clear specific cache store
php artisan cache:clear --store=redis

# Cache forget specific key
php artisan cache:forget teachers.all

# View cache information
php artisan tinker
Cache::all()
```

---

### Laravel Octane

**What is Octane?**
Supercharges your Laravel application by loading your application once and keeping it warm while serving requests at extreme speeds.

**Installation**:
```bash
composer require laravel/octane

# Choose server (Swoole or FrankenPHP)
php artisan octane:install

# For FrankenPHP (recommended for Windows/development):
php artisan octane:install --server=frankenphp
```

**Starting Octane**:
```bash
# Start with FrankenPHP (default port 8000)
php artisan octane:start --server=frankenphp

# Start with specific port
php artisan octane:start --server=frankenphp --port=8001

# With reload on file changes
php artisan octane:start --server=frankenphp --watch

# With specific number of workers
php artisan octane:start --server=frankenphp --workers=4
```

**Performance Benefits**:
- ✅ 25x faster than traditional Laravel
- ✅ Request warm state (no bootstrap overhead)
- ✅ Connection pooling
- ✅ Multiple worker processes
- ✅ Automatic reload on code changes

**Memory Usage**:
- Traditional Laravel: ~20MB per request
- Octane: ~5MB per request (80% reduction)

**Example Timing**:
```
Traditional PHP-FPM:
Cold request: 120ms
Warm request: 100ms

Octane (with caching):
Cold request: 10ms
Warm request: 5ms
```

**Configuration**: `config/octane.php`

**Monitoring Octane**:
```bash
# Watch Octane dashboard (if available)
php artisan octane:status
```

---

## 🗄️ Database Layer

### Database Architecture

**Development**: SQLite (file-based)
**Production**: MySQL 8.0+

### Database Tables

```sql
-- Users (Laravel Breeze)
users ─────────────────────────────────
id | name | email | password | created_at

-- Core Content
teachers ──────────────────────────────
id | name | subject | bio | email | created_at

news ──────────────────────────────────
id | title | content | published_at | created_at

galleries ─────────────────────────────
id | title | category | image_path | created_at

agendas ───────────────────────────────
id | title | start_date | end_date | location

facilities ────────────────────────────
id | name | description | quantity | created_at

abouts ─────────────────────────────────
id | title | content | type | created_at

registrations ─────────────────────────
id | student_name | email | status | created_at
```

### Eloquent ORM Features

**Relationships**:
```php
// One-to-Many
class Teacher extends Model {
    public function classes() {
        return $this->hasMany(TeacherClass::class);
    }
}

// Many-to-Many
class Teacher extends Model {
    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }
}
```

**Query Optimization**:
```php
// Eager loading to prevent N+1 queries
Teacher::with('subjects')->paginate(15);

// Query caching
$teachers = Teacher::with('subjects')
    ->where('status', 'active')
    ->latest()
    ->get();
```

---

## 📦 Installed Packages

```json
{
    "php": "^8.2",
    "laravel/framework": "^12.0",
    "laravel/tinker": "^2.10.1",
    "filament/filament": "^3.2",
    "laravel/breeze": "^2.1",
    "laravel/octane": "^2.4",
    "livewire/livewire": "^3.6",
    "predis/predis": "^2.2",
    "symfony/process": "^7.1"
}
```

---

## 🚀 Development Workflow

### Setup

```bash
# Clone & setup
cd 4329_Yusuf_Hammam
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
```

### Local Development

**Option 1: Traditional Server**
```bash
# Terminal 1: API Server
php artisan serve

# Terminal 2: Asset bundler
npm run dev
```

**Option 2: Octane Server (recommended)**
```bash
# Single terminal with hot reload
php artisan octane:start --server=frankenphp --watch
```

### Admin Panel Development

```bash
# Access Filament admin
http://localhost:8000/admin

# Create new admin user
php artisan tinker
>>> App\Models\User::create([
>>>     'name' => 'Admin',
>>>     'email' => 'admin@example.com',
>>>     'password' => bcrypt('password')
>>> ])
```

---

## 🔧 Configuration Files

| File | Purpose |
|------|---------|
| `.env` | Environment variables (database, cache, mail) |
| `config/app.php` | Application settings |
| `config/cache.php` | Caching drivers (Redis/Memcached) |
| `config/database.php` | Database connections |
| `config/octane.php` | Octane server configuration |
| `tailwind.config.js` | Tailwind CSS theme |
| `vite.config.js` | Vite bundler configuration |

---

## 📊 Architecture Diagram

```
┌────────────────────────────────────────────────────────────┐
│                    CLIENT BROWSER                           │
└────────────────────────────────────────────────────────────┘
                            ↓↑
            ┌───────────────────────────────┐
            │   WEB SERVER (Octane/PHP-FPM) │
            └───────────────────────────────┘
                   ↓                    ↑
    ┌──────────────────────────────────────┐
    │         LARAVEL APPLICATION          │
    ├──────────────────────────────────────┤
    │ • Livewire Components                │
    │ • Blade Templates                    │
    │ • Eloquent ORM                       │
    │ • Middleware Stack                   │
    └──────────────────────────────────────┘
         ↓              ↓             ↓
    ┌─────────┐  ┌──────────┐  ┌─────────┐
    │ Database │  │  Cache   │  │ Storage │
    │ (MySQL)  │  │ (Redis)  │  │(Images) │
    └─────────┘  └──────────┘  └─────────┘
```

---

## ✅ Production Deployment Checklist

- [ ] Update `.env` for production (database, cache, mail)
- [ ] Run database migrations: `php artisan migrate --force`
- [ ] Cache configuration: `php artisan config:cache`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Optimize autoloader: `composer install -o --no-dev`
- [ ] Start Octane: `php artisan octane:start --server=frankenphp`
- [ ] Monitor Redis cache connection
- [ ] Setup SSL certificate (HTTPS)
- [ ] Configure worker processes in Octane
- [ ] Setup log rotation and monitoring

---

## 📚 Resources & Documentation

- 🔗 [Laravel Documentation](https://laravel.com/docs)
- 🔗 [Livewire Documentation](https://livewire.laravel.com)
- 🔗 [Filament Documentation](https://filamentphp.com)
- 🔗 [Tailwind CSS Documentation](https://tailwindcss.com)
- 🔗 [Alpine.js Documentation](https://alpinejs.dev)
- 🔗 [Laravel Octane](https://laravel.com/docs/octane)
- 🔗 [Laravel Breeze](https://laravel.com/docs/breeze)

---

**Last Updated**: 22 February 2026  
**Maintained by**: Development Team
