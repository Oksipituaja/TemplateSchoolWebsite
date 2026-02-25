<?php
// Test if images are being rendered in HTML
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

// Simulate a web request
use Illuminate\Http\Request;
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Request::create('/', 'GET');
$app->instance('request', $request);

// Get principal greeting
$principal = \App\Models\About::where('key', 'principal_greeting')->first();
echo "=== PRINCIPAL GREETING ===\n";
if ($principal) {
    echo "Title: " . $principal->title . "\n";
    echo "Image in DB: " . ($principal->image ? "✓ YES" : "✗ NO") . "\n";
    echo "Image path: " . ($principal->image ?? 'N/A') . "\n";
    
    // Test the asset() function
    $assetPath = asset('storage/' . $principal->image);
    echo "Generated URL: " . $assetPath . "\n";
    
    // Check if file exists
    $filePath = public_path('storage/' . $principal->image);
    echo "File exists: " . (file_exists($filePath) ? "✓ YES" : "✗ NO") . "\n";
    echo "File size: " . (file_exists($filePath) ? filesize($filePath) : 'N/A') . " bytes\n";
} else {
    echo "NO RECORD FOUND\n";
}

echo "\n=== HERO IMAGE ===\n";
$hero = \App\Models\About::where('key', 'hero_image')->first();
if ($hero) {
    echo "Title: " . $hero->title . "\n";
    echo "Image in DB: " . ($hero->image ? "✓ YES" : "✗ NO") . "\n";
    echo "Image path: " . ($hero->image ?? 'N/A') . "\n";
} else {
    echo "NO RECORD FOUND\n";
}
?>
