# Google Maps Configuration Guide

## How to Customize Google Maps in Footer

The Google Maps section is now integrated into the footer. To customize it with your school's actual location, follow these steps:

### Step 1: Get Your Location URL from Google Maps
1. Open [Google Maps](https://www.google.com/maps)
2. Search for your school address
3. Copy the URL from the address bar

### Step 2: Generate Embed Code
1. Click the **Share** button
2. Click **Embed a map**
3. Copy the entire iframe code

### Step 3: Update the Footer
Edit the file: `resources/views/components/layouts/app.blade.php`

Find this section in the Google Maps part:
```html
<iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=..." 
```

Replace the `src` attribute with your copied iframe's `src` value from Step 2.

### Example Custom Embed
If your Google Maps share link is:
```
https://www.google.com/maps/embed?pb=YOUR_MAP_CODE_HERE
```

Update it in the footer file accordingly.

## Alternative: Using Environment Variables (Optional)

To make this dynamic, you can:

1. Add to `.env`:
```
GOOGLE_MAPS_EMBED_URL=https://www.google.com/maps/embed?pb=YOUR_CODE_HERE
```

2. Update the footer blade:
```blade
<iframe class="w-full h-full" src="{{ env('GOOGLE_MAPS_EMBED_URL') }}" ...>
```

## Supported Coordinate Format
- Latitude: 7.055677 (example: Yogyakarta area)
- Longitude: 110.406355 (example: Yogyakarta area)

Update these values with your school's exact coordinates for accurate positioning.

## Current Configuration
Location: `Jl. Pendidikan No. 123, Kota, Provinsi 12345`
Coordinates: -7.055677, 110.406355 (placeholder - update with your actual location)

Remember to test the map after updating to ensure it displays your school's correct location!
