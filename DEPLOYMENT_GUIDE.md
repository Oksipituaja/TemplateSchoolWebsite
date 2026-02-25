# SD Bangsri School Website - Laravel Rebuilding Guide

## Project Overview

This is a complete Laravel-based rebuild of the SD Bangsri School website with modern architecture using the TALL Stack (Tailwind, Alpine, Laravel, Livewire), Filament Admin Panel, and high-performance configurations.

## Architecture Stack

### Backend
- **Framework**: Laravel 12
- **Admin Panel**: Filament v3 (Advanced admin dashboard for managing content)
- **Authentication**: Laravel Breeze (Login & Registration system)
- **Real-time**: Livewire v3 (Reactive components without JavaScript)
- **Performance Server**: Laravel Octane with FrankenPHP (High-performance request handling)

### Frontend
- **CSS Framework**: Tailwind CSS v4
- **Interactivity**: Alpine.js (Lightweight JavaScript framework)
- **Components**: Livewire (Server-driven reactive components)
- **Responsiveness**: Mobile-first design

### Database & Caching
- **Database**: SQLite (Development) | MySQL (Production)
- **Caching**: Redis with Predis driver
- **Cache Strategy**: Database query caching, session caching

## Installation & Setup

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & npm
- Redis (optional, for production caching)

### Initial Setup

```bash
cd 4329_Yusuf_Hammam

# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Create database and run migrations
php artisan migrate

# Install Node dependencies (for Tailwind CSS)
npm install

# Build frontend assets
npm run build
```

### Development Server

#### Option 1: Using Laravel Octane (Recommended for Performance)
```bash
# Install FrankenPHP (Windows compatibility)
php artisan octane:start --server=frankenphp

# Or use Swoole if available
php artisan octane:start --server=swoole
```

#### Option 2: Using Traditional Laravel Server
```bash
php artisan serve
```

#### Option 3: Using Vite Dev Server (with Hot Module Replacement)
```bash
npm run dev
```

## Database Schema

### Users Table
- Admin users and system administrators
- Inherited from Laravel Breeze

### Teachers
- `id`: Primary key
- `name`: Teacher full name
- `slug`: URL-friendly name
- `email`: Teacher email
- `phone`: Contact number
- `subject`: Subject taught
- `bio`: Biography
- `image`: Profile image path

### News (Articles)
- `id`: Primary key
- `title`: Article title
- `slug`: URL-friendly title
- `content`: Full article content (rich text)
- `excerpt`: Short summary
- `featured_image`: Header image
- `user_id`: Author reference (FK to users)
- `status`: 'draft' or 'published'
- `published_at`: Publication date/time

### Gallery
- `id`: Primary key
- `title`: Image title
- `slug`: URL-friendly title
- `description`: Image description
- `category`: Category (library, sports, art, computer, science, event, nature, food, graduation)
- `image`: Image file path

### Agenda
- `id`: Primary key
- `title`: Event title
- `slug`: URL-friendly title
- `description`: Event description
- `event_date`: Date of event
- `location`: Event location
- `status`: 'upcoming', 'ongoing', or 'completed'

### Facilities
- `id`: Primary key
- `name`: Facility name
- `slug`: URL-friendly name
- `description`: Facility details
- `icon`: Icon class (heroicon)
- `image`: Facility image

### About
- `id`: Primary key
- `key`: Unique identifier (e.g., 'school-info', 'mission', 'vision')
- `title`: Section title
- `content`: Rich text content
- `image`: Associated image

### Registrations (PPDB)
- `id`: Primary key
- `student_name`: Student full name
- `email`: Contact email
- `phone`: Contact phone
- `birth_date`: Date of birth
- `current_school`: School currently attending
- `address`: Student address
- `guardian_name`: Parent/guardian name
- `guardian_phone`: Parent/guardian phone
- `status`: 'pending', 'approved', or 'rejected'
- `notes`: Admin notes

## File Structure

```
4329_Yusuf_Hammam/
├── app/
│   ├── Filament/
│   │   └── Resources/           # Filament CRUD resources
│   │       ├── TeacherResource.php
│   │       ├── NewsResource.php
│   │       ├── GalleryResource.php
│   │       ├── AgendaResource.php
│   │       ├── FacilityResource.php
│   │       ├── RegistrationResource.php
│   │       └── AboutResource.php
│   ├── Livewire/
│   │   └── Pages/               # Livewire page components
│   │       ├── Home.php
│   │       ├── About.php
│   │       ├── News.php
│   │       ├── NewsDetail.php
│   │       ├── Gallery.php
│   │       ├── Teachers.php
│   │       ├── Agenda.php
│   │       ├── Facilities.php
│   │       ├── PPDB.php
│   │       ├── Privacy.php
│   │       └── Terms.php
│   ├── Models/                  # Eloquent models
│   │   ├── Teacher.php
│   │   ├── News.php
│   │   ├── Gallery.php
│   │   ├── Agenda.php
│   │   ├── Facility.php
│   │   ├── About.php
│   │   └── Registration.php
│   └── Providers/
├── config/                      # Laravel configuration files
├── database/
│   ├── migrations/              # Database migrations
│   └── seeders/                 # Seed data
├── public/                      # Public assets
│   ├── storage/                 # User uploaded files
│   └── assets/                  # Images, CSS, JS
├── resources/
│   ├── views/
│   │   ├── livewire/
│   │   │   └── pages/          # Livewire component views
│   │   ├── layouts/            # Layout templates
│   │   ├── components/         # Reusable components
│   │   └── auth/               # Authentication views (Breeze)
│   └── css/
│       └── app.css             # Tailwind CSS
├── routes/
│   └── web.php                 # Web routes
├── storage/                    # Local storage for files
├── tests/                      # Test suites
├── .env                        # Environment configuration
├── .env.example                # Example environment
├── artisan                     # Laravel CLI
├── composer.json               # PHP dependencies
├── package.json                # Node dependencies
└── vite.config.js             # Vite bundler configuration
```

## Admin Panel Access

### Accessing Filament Admin
- URL: `http://localhost:8000/admin`
- Use the admin account created with Laravel Breeze

### Admin Features

#### Teachers Management
- Add, edit, delete teacher profiles
- Upload teacher photos
- Manage subjects and contact information
- Search and sort by name or email

#### News Management
- Create and publish news articles
- Rich text editor for content
- Featured image upload
- Draft and publish states
- Category tagging

#### Gallery Management
- Upload gallery images
- Organize by categories
- Bulk upload support
- Image descriptions and metadata

#### Agenda Management
- Create school events and activities
- Set event dates and locations
- Track event status (Upcoming, Ongoing, Completed)
- Calendar integration ready

#### Facilities Management
- Showcase school infrastructure
- Add facility images and descriptions
- Icon and visual representation
- Searchable facility listings

#### Student Registrations (PPDB)
- Manage student registration applications
- Status tracking (Pending, Approved, Rejected)
- Student and guardian information
- Notes and comments for administrators

#### About Pages Management
- Manage multiple content sections
- School information, mission, vision
- Rich text content with images
- SEO-friendly content management

## Frontend Pages

### Public Pages (Available to all visitors)

1. **Home** (`/`)
   - Featured news articles
   - Random gallery images
   - Facility highlights
   - Quick navigation

2. **About** (`/about`)
   - School information
   - Mission and vision
   - History and achievements

3. **News & Articles** (`/news`)
   - Paginated list of published articles
   - Search functionality
   - Filter by date

4. **News Detail** (`/news/{slug}`)
   - Full article view
   - Related articles
   - Sharing options

5. **Teachers** (`/teachers`)
   - Teacher profiles with photos
   - Subject information
   - Contact details
   - Pagination

6. **Gallery** (`/gallery`)
   - Image gallery with categories
   - Masonry layout
   - Filter by category
   - Lightbox viewer

7. **Agenda** (`/agenda`)
   - Upcoming events
   - Event calendar
   - Location information
   - Filter by status

8. **Facilities** (`/facilities`)
   - School facilities showcase
   - Facility descriptions
   - Images and specifications

9. **PPDB Registration** (`/ppdb`)
   - Student registration form
   - Parent/Guardian information
   - Online form submission
   - Email notification

10. **Privacy Policy** (`/privacy-policy`)
    - Legal privacy information
    - Data protection details

11. **Terms & Conditions** (`/terms-and-conditions`)
    - Legal terms
    - Usage guidelines

## Livewire Components

All page components are interactive Livewire components that provide real-time reactivity without page refreshes:

```php
// Example: News page with search
public string $search = '';

public function render()
{
    $news = NewsModel::where('status', 'published')
        ->when($this->search, function ($query) {
            $query->where('title', 'like', "%{$this->search}%");
        })
        ->orderBy('published_at', 'desc')
        ->paginate(9);

    return view('livewire.pages.news', ['news' => $news]);
}
```

## Caching Strategy

### Database Query Caching
```php
// Cache query results for 1 hour
$news = News::where('status', 'published')
    ->remember(3600)
    ->get();
```

### Session Caching with Cookies
- User preferences stored in cookies
- Session driver configured to use cookies (not database)
- Reduces database queries for session data

### Redis Setup (Optional)

If you want to use Redis for advanced caching:

1. Install Redis server on your system
2. Update `.env`:
   ```
   CACHE_STORE=redis
   REDIS_HOST=127.0.0.1
   REDIS_PORT=6379
   ```

3. Clear cache after changes:
   ```bash
   php artisan cache:clear
   ```

## Performance Optimization

### Octane Performance Server
- Servers HTTP requests directly without PHP-FPM overhead
- In-memory app bootstrapping for faster request handling
- Better for high-traffic scenarios
- Connection pooling support

### Lazy Loading
- Images use lazy loading with Alpine.js
- Reduces initial page load time
- Better for gallery and large content pages

### Asset Minification
- CSS and JavaScript minified for production
- Build with: `npm run build`

### Database Indexing
- Migration files include indexed columns for fast queries
- Primary keys auto-indexed
- Foreign keys indexed for relationships

## API Integration

Future API endpoints can be added in `routes/api.php`:

```php
Route::prefix('api')->group(function () {
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/gallery', [GalleryController::class, 'index']);
    // ... more endpoints
});
```

## Deployment

### Environment Configuration

Production `.env` settings:
```env
APP_ENV=production
APP_DEBUG=false
CACHE_STORE=redis
SESSION_DRIVER=cookie
DB_CONNECTION=mysql
OCTANE_SERVER=frankenphp
```

### Asset Compilation

```bash
# Production build
npm run build

# Clear caches
php artisan cache:clear
php artisan view:clear
php artisan config:cache

# Run migrations
php artisan migrate --force
```

## Development Commands

```bash
# Database
php artisan migrate              # Run migrations
php artisan migrate:rollback     # Rollback migrations
php artisan migrate:refresh      # Refresh database
php artisan db:seed              # Seed database with data

# Cache Management
php artisan cache:clear          # Clear all caches
php artisan cache:forget key     # Clear specific key
php artisan view:clear           # Clear view cache

# Filament
php artisan filament:install     # Install Filament

# Frontend
npm run dev                       # Development build with HMR
npm run build                     # Production build
npm run lint                      # Code linting
```

## Customization Guide

### Adding a New Content Type

1. **Create Migration**:
   ```bash
   php artisan make:migration create_events_table
   ```

2. **Create Model**:
   ```php
   namespace App\Models;
   use Illuminate\Database\Eloquent\Model;
   
   class Event extends Model
   {
       protected $fillable = ['name', 'date', 'location'];
   }
   ```

3. **Create Filament Resource** (manually or with command):
   ```php
   namespace App\Filament\Resources;
   // ... Resource implementation
   ```

4. **Create Livewire Component**:
   ```php
   namespace App\Livewire\Pages;
   // ... Component implementation
   ```

5. **Add Route**:
   ```php
   Route::get('/events', Events::class)->name('events');
   ```

## Troubleshooting

### Octane Won't Start
- Check if FrankenPHP/Swoole is properly installed
- Fall back to traditional Laravel server: `php artisan serve`
- Check logs: `grep -r "error" storage/logs/`

### Cache Not Working
- Verify Redis is running: `redis-cli ping`
- Clear cache: `php artisan cache:clear`
- Check `.env` CACHE_STORE setting

### Missing Assets
- Rebuild assets: `npm run build`
- Clear browser cache
- Check `public/build/` directory exists

### Database Issues
- Check database connection in `.env`
- Run migrations: `php artisan migrate`
- Verify database file exists (`database/database.sqlite`)

## Support & Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com)
- [Livewire Documentation](https://livewire.laravel.com)
- [Tailwind CSS Documentation](https://tailwindcss.com)
- [Laravel Octane Documentation](https://laravel.com/docs/octane)

## Project Status

✅ Core setup complete
✅ Database schema designed and migrated
✅ Filament admin panel configured
✅ Livewire components created
✅ Routes established
✅ Authentication system (Breeze)
✅ Performance optimization (Octane, Redis)

⏳ Next Steps:
- [ ] Create Blade views for all Livewire components
- [ ] Add sample data (seeders)
- [ ] Implement search functionality
- [ ] Add image optimization
- [ ] Create API endpoints
- [ ] Add email notifications
- [ ] Setup testing suite
- [ ] Deploy to production

## Notes

- All models use Laravel's Eloquent ORM for database interactions
- Filament automatically handles form validation and database operations
- Livewire components are reactive - changes update in real-time
- Caching is configured but can be toggled in `.env`
- Asset pipeline uses Vite for fast development and production builds

---

**Created**: February 21, 2026
**Version**: 1.0.0
**Status**: Development Ready
