<?php
require_once 'config.php';

// Get code ID or slug from URL (backward compatible with query strings)
$code_id = 0;
$code = null;

// Try to get ID from clean URL or query string
if (isset($_GET['id'])) {
    $code_id = intval($_GET['id']);
    $code = getCodeById($code_id);
}
// Try to get by slug (if using slug-based URLs)
elseif (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $all_codes = getAllCodes();
    foreach ($all_codes as $c) {
        if (createSlug($c['title']) === $slug) {
            $code = $c;
            break;
        }
    }
}

// Redirect if code not found
if (!$code) {
    header('Location: ' . getCodesUrl());
    exit;
}

$page_title = $code['title'];
$difficulty_color = $difficulty_levels[$code['difficulty']]['color'];
?>

<?php include 'includes/header.php'; ?>

<!-- Breadcrumb -->
<div class="bg-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="<?php echo getHomeUrl(); ?>" class="text-gray-500 hover:text-purple-600">Home</a>
                </li>
                <li>
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </li>
                <li>
                    <a href="<?php echo getCategoryUrl($code['category']); ?>" class="text-gray-500 hover:text-purple-600">
                        <?php echo $categories[$code['category']]['name']; ?>
                    </a>
                </li>
                <li>
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </li>
                <li>
                    <span class="text-gray-700 font-medium"><?php echo $code['title']; ?></span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Code Details -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex items-center space-x-3 mb-4">
                    <span class="badge badge-<?php echo $difficulty_color; ?>">
                        <?php echo $difficulty_levels[$code['difficulty']]['name']; ?>
                    </span>
                    <span class="text-sm text-gray-500">
                        Updated: <?php echo date('M d, Y', strtotime($code['date'])); ?>
                    </span>
                </div>
                
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    <?php echo $code['title']; ?>
                </h1>
                
                <?php 
                $partNumber = getZ2MPartNumber($code);
                if ($partNumber): 
                ?>
                <div class="mb-4">
                    <span class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Z2M Part Number:</span>
                    <span class="ml-2 text-lg font-bold text-purple-600"><?php echo $partNumber; ?></span>
                </div>
                <?php endif; ?>
                
                <p class="text-xl text-gray-600 mb-6">
                    <?php echo $code['description']; ?>
                </p>
                
                <!-- Tags -->
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($code['tags'] as $tag): ?>
                        <span class="text-sm bg-purple-100 text-purple-700 px-3 py-1 rounded-full">
                            #<?php echo $tag; ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Code Block -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="bg-gray-800 px-6 py-4 flex items-center justify-between">
                    <span class="text-white font-semibold">Arduino Code</span>
                    <button onclick="copyCode()" 
                            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        Copy Code
                    </button>
                </div>
                <pre><code id="code-block" class="language-arduino"><?php echo htmlspecialchars($code['code']); ?></code></pre>
            </div>
            
            <!-- How to Use -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8 rounded-r-lg">
                <h3 class="text-lg font-bold text-blue-900 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    How to Use
                </h3>
                <ol class="list-decimal list-inside space-y-2 text-blue-900">
                    <li>Connect the required components as per the circuit diagram</li>
                    <li>Open Arduino IDE and create a new sketch</li>
                    <li>Copy and paste the code above</li>
                    <li>Select your Arduino board and COM port from Tools menu</li>
                    <li>Click the Upload button to upload the code to your Arduino</li>
                    <li>Open Serial Monitor (if applicable) to see the output</li>
                </ol>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Components Required -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-6 sticky top-20">
                <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Components Required
                </h3>
                <ul class="space-y-2">
                    <?php foreach ($code['components'] as $component): ?>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700"><?php echo $component; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                <hr class="my-6">
                
                <!-- Info -->
                <div class="space-y-3">
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <span class="font-medium">Category:</span>
                        <span class="ml-2"><?php echo $categories[$code['category']]['name']; ?></span>
                    </div>
                    
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-medium">Author:</span>
                        <span class="ml-2"><?php echo $code['author']; ?></span>
                    </div>
                </div>
                
                <hr class="my-6">
                
                <!-- Actions -->
                <div class="space-y-3">
                    <a href="<?php echo getCategoryUrl($code['category']); ?>" 
                       class="block text-center bg-purple-600 hover:bg-purple-700 text-white px-4 py-3 rounded-lg font-semibold transition">
                        More from this Category
                    </a>
                    <a href="<?php echo getCodesUrl(); ?>" 
                       class="block text-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-3 rounded-lg font-semibold transition">
                        Browse All Codes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyCode() {
    const codeBlock = document.getElementById('code-block');
    const textArea = document.createElement('textarea');
    textArea.value = codeBlock.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
    
    // Show feedback
    const button = event.target.closest('button');
    const originalHTML = button.innerHTML;
    button.innerHTML = '<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Copied!';
    
    setTimeout(() => {
        button.innerHTML = originalHTML;
    }, 2000);
}
</script>

<?php include 'includes/footer.php'; ?>

