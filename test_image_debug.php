<?php
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Illuminate\Http\Request::capture());

// Get About records
$abouts = \App\Models\About::all();
foreach ($abouts as $about) {
    echo "ID: {$about->id}, Key: {$about->key}, Title: {$about->title}, Image: {$about->image}\n";
}

echo "\n--- Principal Greeting ---\n";
$principal = \App\Models\About::where('key', 'principal_greeting')->first();
if ($principal) {
    echo "Found: {$principal->title}\n";
    echo "Image: {$principal->image}\n";
    echo "Image path: " . asset('storage/' . $principal->image) . "\n";
    echo "File exists: " . (file_exists('public/storage/' . $principal->image) ? 'YES' : 'NO') . "\n";
} else {
    echo "Not found\n";
}
?>
