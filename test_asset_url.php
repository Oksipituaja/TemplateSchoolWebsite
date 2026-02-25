<?php
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

// Get app config
$appUrl = config('app.url');
echo "APP_URL config: $appUrl\n";

// Create a test request
$request = \Illuminate\Http\Request::create('/test', 'GET');
$app->instance('request', $request);

// Test asset() function
$testImagePath = 'storage/about/sCG8AQwISYYWkCQ22D5iiXV2jP71g7sZbcFuyjCn.jpg';
$assetUrl = asset($testImagePath);
echo "asset('$testImagePath'): $assetUrl\n";

// Direct URL construction
$storagePath = 'about/sCG8AQwISYYWkCQ22D5iiXV2jP71g7sZbcFuyjCn.jpg';
$principal = \App\Models\About::where('key', 'principal_greeting')->first();
if ($principal) {
    echo "\nPrincipal Image DB value: " . $principal->image . "\n";
    echo "With asset() helper: " . asset('storage/' . $principal->image) . "\n";
}
?>
