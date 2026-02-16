<?php
require_once 'config.php';

// Get filter parameters (support both clean URLs and query strings)
$selected_category = isset($_GET['category']) ? $_GET['category'] : null;
$selected_difficulty = isset($_GET['difficulty']) ? $_GET['difficulty'] : null;
$search_query = isset($_GET['search']) ? $_GET['search'] : null;

// Backward compatibility: Redirect old query string URLs to clean URLs
// This ensures old URLs like codes.php?category=sensors redirect to /category/sensors
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query_string = $_SERVER['QUERY_STRING'] ?? '';

// Only redirect if accessing codes.php directly (not via clean URL rewrite)
if (strpos($request_uri, 'codes.php') !== false && !empty($query_string)) {
    $clean_url = '';
    if ($selected_category) {
        $clean_url = getCategoryUrl($selected_category);
    } elseif ($selected_difficulty) {
        $clean_url = getDifficultyUrl($selected_difficulty);
    } elseif ($search_query) {
        $clean_url = getSearchUrl($search_query);
    }
    
    // Redirect to clean URL (301 permanent redirect for SEO)
    if ($clean_url) {
        header('Location: ' . $clean_url, true, 301);
        exit;
    }
}

// Filter codes
$filtered_codes = filterCodes($selected_category, $selected_difficulty, $search_query);

// Page title
$page_title = 'All Codes';
if ($selected_category && isset($categories[$selected_category])) {
    $page_title = $categories[$selected_category]['name'] . ' Codes';
}
?>

<?php include 'includes/header.php'; ?>

<!-- Page Header -->
<div class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <?php 
            if ($selected_category && isset($categories[$selected_category])) {
                echo $categories[$selected_category]['icon'] . ' ' . $categories[$selected_category]['name'];
            } else {
                echo 'Code Library';
            }
            ?>
        </h1>
        <p class="text-xl text-purple-100">
            <?php 
            if ($selected_category && isset($categories[$selected_category])) {
                echo $categories[$selected_category]['description'];
            } else {
                echo 'Browse our collection of ' . count(getAllCodes()) . ' Arduino and programming codes';
            }
            ?>
        </p>
    </div>
</div>

<!-- Search and Filter Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="GET" action="<?php echo getCodesUrl(); ?>" class="space-y-4" id="filter-form">
            <!-- Search Bar -->
            <div class="relative">
                <input type="text" 
                       name="search" 
                       value="<?php echo htmlspecialchars($search_query ?? ''); ?>"
                       placeholder="Search codes by title, description, or tags..." 
                       class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <svg class="absolute left-4 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            
            <!-- Filters -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Category Filter -->
                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $cat_key => $category): ?>
                        <option value="<?php echo $cat_key; ?>" <?php echo $selected_category == $cat_key ? 'selected' : ''; ?>>
                            <?php echo $category['icon'] . ' ' . $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <!-- Difficulty Filter -->
                <select name="difficulty" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option value="">All Difficulty Levels</option>
                    <?php foreach ($difficulty_levels as $diff_key => $difficulty): ?>
                        <option value="<?php echo $diff_key; ?>" <?php echo $selected_difficulty == $diff_key ? 'selected' : ''; ?>>
                            <?php echo $difficulty['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <!-- Submit Button -->
                <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-purple-700 transition">
                    Apply Filters
                </button>
            </div>
            
            <!-- Clear Filters -->
            <?php if ($selected_category || $selected_difficulty || $search_query): ?>
                <div class="text-center">
                    <a href="<?php echo getCodesUrl(); ?>" class="text-purple-600 hover:text-purple-700 font-medium">
                        Clear all filters
                    </a>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>

<!-- Results Count -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <p class="text-gray-600">
        Showing <span class="font-semibold text-gray-900"><?php echo count($filtered_codes); ?></span> 
        code<?php echo count($filtered_codes) != 1 ? 's' : ''; ?>
    </p>
</div>

<!-- Codes Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 mb-12">
    <?php if (count($filtered_codes) > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($filtered_codes as $code): 
                $difficulty_color = $difficulty_levels[$code['difficulty']]['color'];
            ?>
                <div class="code-card bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span class="badge badge-<?php echo $difficulty_color; ?>">
                                    <?php echo $difficulty_levels[$code['difficulty']]['name']; ?>
                                </span>
                                <?php if (!empty(getCodeImagePath($code))): ?>
                                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full flex items-center" title="Includes circuit diagram">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Diagram
                                </span>
                                <?php endif; ?>
                            </div>
                            <span class="text-2xl">
                                <?php echo $categories[$code['category']]['icon']; ?>
                            </span>
                        </div>
                        
                        <!-- Title & Description -->
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            <?php echo $code['title']; ?>
                        </h3>
                        <?php 
                        $partNumber = getZ2MPartNumber($code);
                        if ($partNumber): 
                        ?>
                        <div class="mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Z2M Part Number:</span>
                            <a href="<?php echo getCodeUrl($code); ?>" class="ml-2 text-sm font-bold text-purple-600 hover:text-purple-700 hover:underline transition cursor-pointer">
                                <?php echo $partNumber; ?>
                            </a>
                        </div>
                        <?php endif; ?>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            <?php echo $code['description']; ?>
                        </p>
                        
                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php foreach (array_slice($code['tags'], 0, 3) as $tag): ?>
                                <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">
                                    #<?php echo $tag; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                        
                        <!-- Footer -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <span class="text-sm text-gray-500">
                                <?php echo date('M d, Y', strtotime($code['date'])); ?>
                            </span>
                            <a href="<?php echo getCodeUrl($code); ?>" 
                               class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700 transition">
                                View Code
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- No Results -->
        <div class="text-center py-16">
            <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">No codes found</h3>
            <p class="text-gray-600 mb-6">Try adjusting your filters or search query</p>
            <a href="<?php echo getCodesUrl(); ?>" class="inline-block bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition">
                View All Codes
            </a>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>

