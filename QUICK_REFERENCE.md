# 🚀 Quick Reference Guide

## Development Commands - Complete

### 🚀 First-Time Setup
```bash
cd 4329_Yusuf_Hammam
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed                     # Optional: seed sample data
npm run build
php artisan serve
```

### 🎯 Daily Development

#### Option A: Traditional Server
```bash
# Terminal 1: Start API server
php artisan serve                       # runs on http://localhost:8000

# Terminal 2: Watch & build frontend assets
npm run dev                             # includes hot reload (HMR)
```

#### Option B: Octane Server (Recommended - 25x faster)
```bash
# Single command with auto-reload
php artisan octane:start --server=frankenphp --watch

# Custom port
php artisan octane:start --server=frankenphp --port=8001

# Specific number of workers
php artisan octane:start --server=frankenphp --workers=4
```

### 🗄️ Database Operations
```bash
# Run all pending migrations
php artisan migrate

# Run specific migration
php artisan migrate --path=database/migrations/2025_02_21_000001_create_teachers_table.php

# Create new migration
php artisan make:migration create_table_name

# Rollback last batch
php artisan migrate:rollback

# Rollback specific steps
php artisan migrate:rollback --step=2

# Reset entire database
php artisan migrate:refresh

# Reset and seed
php artisan migrate:refresh --seed

# Refresh specific migration
php artisan migrate:refresh --path=database/migrations/2025_02_21_000001_create_teachers_table.php

# Seed database with sample data
php artisan db:seed

# Seed specific seeder
php artisan db:seed --class=TeacherSeeder
```

### 💾 Cache & Performance

#### Cache Management
```bash
# Clear all application cache
php artisan cache:clear

# Clear specific cache store
php artisan cache:clear --store=redis

# Clear specific cache key
php artisan cache:forget teachers.all

# Clear specific tags
php artisan cache:clear --tags=teachers

# Clear view cache
php artisan view:clear

# Clear route cache
php artisan route:clear

# Clear config cache
php artisan config:clear

# Cache configuration (production)
php artisan config:cache

# Cache routes (production)
php artisan route:cache

# Optimize laravel (composer)
composer install --optimize-autoloader --no-dev
```

#### Redis Cache Commands
```bash
# Test Redis connection
redis-cli ping                          # Should return: PONG

# View all cache keys
redis-cli KEYS "*"

# Get specific key
redis-cli GET cache_key_name

# Delete specific key
redis-cli DEL cache_key_name

# Flush all Redis data
redis-cli FLUSHALL
```

#### Code-Level Caching
```php
// In your code (app/Http/Controllers or Service class)
use Illuminate\Support\Facades\Cache;

// Cache for 1 hour (3600 seconds)
$teachers = Cache::remember('teachers.all', 3600, function () {
    return Teacher::with('subject')->get();
});

// Cache forever
$settings = Cache::rememberForever('app.settings', function () {
    return Setting::all();
});

// Forget specific cache
Cache::forget('teachers.all');

// Invalidate on model change
protected static function booted() {
    static::created(function ($model) {
        Cache::forget('teachers.all');
    });
}
```

### 🎛️ Laravel Octane Commands

#### Server Management
```bash
# Start Octane (FrankenPHP)
php artisan octane:start --server=frankenphp

# Start with watch mode (auto-reload on file change)
php artisan octane:start --server=frankenphp --watch

# Start with specific port
php artisan octane:start --server=frankenphp --port=8001

# Start with multiple workers (for concurrent requests)
php artisan octane:start --server=frankenphp --workers=4

# Graceful reload (reload while processing requests)
php artisan octane:reload

# Stop Octane
php artisan octane:stop

# Check Octane status
php artisan octane:status
```

#### Octane Configuration
```bash
# Publish Octane config
php artisan vendor:publish --provider="Laravel\Octane\OctaneServiceProvider"

# Edit: config/octane.php
```

### 🔐 Filament Admin Commands

#### Filament Installation & Setup
```bash
# Install Filament (if not already installed)
composer require filament/filament

# Publish Filament assets
php artisan filament:install

# Create admin user
php artisan make:filament-user

# Create new Resource (CRUD admin interface)
php artisan make:filament-resource Teacher
php artisan make:filament-resource Teacher --generate  # with all defaults

# Create custom admin page
php artisan make:filament-page Dashboard

# Create form component
php artisan make:filament-widget TeacherChart

# List all Filament resources
php artisan filament:show-resources
```

#### Access Filament Admin
```
URL: http://localhost:8000/admin
Default admin path is configurable in: config/filament/admin/options.php
```

#### Create Admin User (Tinker)
```bash
php artisan tinker

# Then in tinker:
>>> App\Models\User::create([
>>>     'name' => 'Admin Name',
>>>     'email' => 'admin@school.test',
>>>     'password' => bcrypt('secure_password'),
>>>     'email_verified_at' => now()
>>> ])
>>> exit
```

### 🔑 Laravel Breeze Commands

#### Breeze Setup (if not already installed)
```bash
# Install Breeze with Livewire
composer require laravel/breeze
php artisan breeze:install livewire

# Publish Breeze views
php artisan vendor:publish --tag=breeze

# Setup Breeze with Filament (optional)
php artisan breeze:install lifeware --teams
```

#### Authentication Routes
```
/register          - User registration form
/login             - User login form
/forgot-password   - Forgot password form
/reset-password/{token} - Password reset form
/dashboard         - Authenticated user dashboard
/profile           - User profile settings
```

#### User Management
```bash
# Create user
php artisan tinker
>>> App\Models\User::create([
>>>     'name' => 'User Name',
>>>     'email' => 'user@example.com',
>>>     'password' => bcrypt('password')
>>> ])

# Update user
>>> $user = App\Models\User::first()
>>> $user->update(['email' => 'newemail@example.com'])

# Delete user
>>> $user->delete()
```

### 📦 NPM & Frontend

#### Asset Building
```bash
# Development mode (watch for changes)
npm run dev

# Production build (optimized)
npm run build

# Watch mode without HMR
npm run watch

# Install dependencies
npm install

# Update packages
npm update
```

### 🧹 Code Maintenance

#### Create New Components/Models
```bash
# Create Model with migration
php artisan make:model News -m

# Create Model with factory and seeder
php artisan make:model News -mfs

# Create Livewire component
php artisan make:livewire Pages.News

# Create Livewire component (class)
php artisan livewire:make Pages/TeachersList

# Create Controller
php artisan make:controller NewsController

# Create API Resource
php artisan make:resource NewsResource
```

#### Code Analysis & Optimization
```bash
# Check code style (Laravel Pint)
./vendor/bin/pint --check

# Fix code style automatically
./vendor/bin/pint

# Run tests
php artisan test

# Run specific test file
php artisan test --filter TestClassName
```

### 🐛 Debugging

#### Laravel Tinker (Interactive Shell)
```bash
php artisan tinker
```

Inside tinker:
```php
# Check if model exists
>>> App\Models\Teacher::count()

# Get recent entries
>>> App\Models\Teacher::latest()->first()

# Get all entries
>>> App\Models\Teacher::all()

# Filter results
>>> App\Models\Teacher::where('status', 'active')->get()

# Update entry
>>> $teacher = App\Models\Teacher::first()
>>> $teacher->update(['name' => 'New Name'])

# Delete entry
>>> $teacher->delete()

# Check cache
>>> Cache::get('teachers.all')

# List all cache keys
>>> Cache::all()

# Exit tinker
>>> exit
```

#### Log Viewing
```bash
# View logs in real-time (if using pail)
php artisan pail

# View specific log file
tail -f storage/logs/laravel.log

# Clear logs
rm storage/logs/laravel.log
```

---

## 📍 URL Routes

| Path | Purpose | Auth Required | Notes |
|------|---------|---------------|-------|
| `/` | Homepage | No | Main landing page |
| `/about` | About school | No | School info & leadership |
| `/news` | News listing | No | Paginated news |
| `/news/{slug}` | Article detail | No | Full article view |
| `/gallery` | Gallery | No | Photo collection |
| `/teachers` | Teachers | No | Staff directory |
| `/agenda` | Events/Calendar | No | School events |
| `/facilities` | Facilities | No | School amenities |
| `/ppdb` | Registration | No | Student enrollment |
| `/privacy-policy` | Privacy policy | No | Legal docs |
| `/terms-and-conditions` | Terms | No | Legal docs |
| `/login` | Login | No | User authentication |
| `/register` | Register | No | New user signup |
| `/forgot-password` | Password reset | No | Forgot password flow |
| `/dashboard` | User dashboard | **Yes** | User home |
| `/profile` | Profile settings | **Yes** | User settings |
| `/admin` | Admin home | **Yes** | Admin dashboard |
| `/admin/teachers` | Manage teachers | **Yes** | Filament resource |
| `/admin/news` | Manage news | **Yes** | Filament resource |
| `/admin/galleries` | Manage gallery | **Yes** | Filament resource |
| `/admin/agendas` | Manage events | **Yes** | Filament resource |
| `/admin/facilities` | Manage facilities | **Yes** | Filament resource |
| `/admin/registrations` | View registrations | **Yes** | Filament resource |

---

## 🔧 Environment Configuration (.env)

### Application Settings
```env
APP_NAME="SD Bangsri"
APP_ENV=local
APP_KEY=base64:XXXX...
APP_DEBUG=true
APP_URL=http://localhost:8000
```

### Database Configuration
```env
DB_CONNECTION=sqlite
# OR MySQL:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bangsri_school
DB_USERNAME=root
DB_PASSWORD=
```

### Cache Configuration
```env
CACHE_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### Mail Configuration (Optional)
```env
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

---

## 📊 File Structure

```
📁 app/
├── 📁 Filament/          # Filament admin resources
├── 📁 Http/
│   └── 📁 Controllers/   # Request controllers
├── 📁 Livewire/
│   └── 📁 Pages/        # Page components
├── 📁 Models/
│   ├── Teacher.php
│   ├── News.php
│   ├── Gallery.php
│   └── ...
└── 📁 Providers/        # Service providers

📁 database/
├── 📁 migrations/        # Database migrations
├── 📁 factories/         # Model factories
└── 📁 seeders/          # Database seeders

📁 resources/
├── 📁 css/
│   └── app.css          # Tailwind CSS
├── 📁 js/
│   └── app.js           # JavaScript
└── 📁 views/
    ├── 📁 components/   # Reusable components
    ├── 📁 livewire/     # Livewire views
    └── welcome.blade.php

📁 config/
├── app.php              # Application config
├── cache.php            # Cache config
├── database.php         # Database config
├── octane.php           # Octane config
└── ...

💾 storage/
├── 📁 app/              # User uploads
├── 📁 logs/             # Application logs
└── 📁 framework/        # Framework cache
```

---

## 🚀 Performance Tips

```bash
# Cache in production
php artisan config:cache
php artisan route:cache
php artisan event:cache
composer install --optimize-autoloader --no-dev

# Use Octane
php artisan octane:start --server=frankenphp --workers=4

# Clear old caches periodically
php artisan cache:clear
php artisan view:clear
```

---

**Last Updated**: 22 February 2026  
**Version**: 1.0.0
| `/admin/galleries` | Manage gallery | Yes |
| `/admin/agendas` | Manage events | Yes |
| `/admin/facilities` | Manage facilities | Yes |
| `/admin/registrations` | Manage PPDB | Yes |
| `/admin/abouts` | Manage about pages | Yes |

## File Organization

```
app/
├── Models/           # Database models (7 files)
├── Livewire/Pages/   # Page components (11 files)
└── Filament/Resources/ # Admin panels (7 files)

routes/
└── web.php          # All routes defined here

database/
├── migrations/       # Database schema
└── seeders/          # Sample data (create these)

resources/
├── views/            # Blade templates (create these)
├── css/              # Tailwind CSS
└── js/               # JavaScript
```

## Model Relationships

```php
// Users have many News articles
User has many News

// News belongs to User
News belongs to User
```

## Livewire Component Tips

```php
// Real-time search
public string $search = '';

// Pagination
public int $perPage = 12;

// Filter state
public string $filter = 'all';

// Validate form
public function submit()
{
    $validated = $this->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
    ]);
}
```

## Filament Resource Tips

```php
// Admin resource structure
public static function form(Form $form): Form
{
    return $form->schema([
        // Add form fields here
    ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            // Add table columns here
        ])
        ->filters([
            // Add filters here
        ])
        ->actions([
            // Add actions here
        ]);
}
```

## Common Database Queries

```php
// Get all published news
News::where('status', 'published')->get();

// Get latest 5 articles
News::latest('published_at')->limit(5)->get();

// Count registrations
Registration::count();

// Get teachers by subject
Teacher::where('subject', 'Math')->get();

// Paginate results
Gallery::paginate(12);

// Search news
News::where('title', 'like', '%search%')->get();
```

## Admin Panel Access

1. Go to: `http://localhost:8000/admin`
2. Login with admin credentials from Breeze setup
3. Manage all content from admin interface

## Troubleshooting

### "migrations not running"
```bash
php artisan migrate --force
```

### "Cannot find view"
```bash
php artisan view:clear
```

### "Assets not loading"
```bash
npm run build
```

### "Octane won't start"
```bash
# Fall back to regular server
php artisan serve
```

### "Cache issues"
```bash
php artisan cache:clear
php artisan config:clear
```

## Code Examples

### Create a Teacher
```php
Teacher::create([
    'name' => 'John Doe',
    'email' => 'john@school.com',
    'subject' => 'Mathematics',
]);
```

### Add News Article
```php
News::create([
    'title' => 'School Event',
    'slug' => 'school-event',
    'content' => 'Event details...',
    'user_id' => auth()->id(),
    'status' => 'published',
    'published_at' => now(),
]);
```

### Get Gallery Images
```php
$images = Gallery::where('category', 'sports')->limit(12)->get();
```

### Register Student
```php
Registration::create([
    'student_name' => 'Student Name',
    'email' => 'student@mail.com',
    'phone' => '081234567890',
    'status' => 'pending',
]);
```

## Environment Variables

```env
APP_NAME=SD Bangsri School
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
CACHE_STORE=database
SESSION_DRIVER=cookie
```

## Useful Links

- [Laravel Docs](https://laravel.com/docs)
- [Filament](https://filamentphp.com)
- [Livewire](https://livewire.laravel.com)
- [Tailwind CSS](https://tailwindcss.com)

## Performance Tips

1. Use Redis for caching in production
2. Optimize images before upload
3. Use lazy loading for images
4. Implement database indexing
5. Cache frequently accessed data

---

**Last Updated**: February 21, 2026
