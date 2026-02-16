<?php
require_once 'config.php';
$page_title = 'Home';
?>

<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<div class="gradient-bg text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6">
            Welcome to <?php echo SITE_NAME; ?>
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-purple-100">
            <?php echo SITE_DESCRIPTION; ?>
        </p>
        <p class="text-lg mb-10 text-purple-100 max-w-3xl mx-auto">
            Discover a comprehensive collection of Arduino sketches, sensor examples, IoT projects, 
            and basic programming codes. Perfect for students, hobbyists, and makers!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo getCodesUrl(); ?>" class="bg-white text-purple-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition shadow-lg">
                Browse All Codes
            </a>
            <a href="<?php echo getCategoryUrl('arduino-basics'); ?>" class="bg-purple-700 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-purple-800 transition shadow-lg">
                Start Learning
            </a>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12">
    <div class="bg-white rounded-xl shadow-xl p-8 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center">
            <div class="text-4xl font-bold gradient-text mb-2">
                <?php echo count(getAllCodes()); ?>+
            </div>
            <div class="text-gray-600 font-medium">Code Examples</div>
        </div>
        <div class="text-center">
            <div class="text-4xl font-bold gradient-text mb-2">
                <?php echo count($categories); ?>
            </div>
            <div class="text-gray-600 font-medium">Categories</div>
        </div>
        <div class="text-center">
            <div class="text-4xl font-bold gradient-text mb-2">100%</div>
            <div class="text-gray-600 font-medium">Free & Open</div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Explore by Category</h2>
        <p class="text-xl text-gray-600">Find the perfect code for your next project</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($categories as $cat_key => $category): ?>
            <?php $cat_codes = filterCodes($cat_key); ?>
            <a href="<?php echo getCategoryUrl($cat_key); ?>" class="category-card block bg-white rounded-xl shadow-md hover:shadow-xl p-6 transition">
                <div class="flex items-start space-x-4">
                    <div class="text-5xl"><?php echo $category['icon']; ?></div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo $category['name']; ?></h3>
                        <p class="text-gray-600 mb-3"><?php echo $category['description']; ?></p>
                        <div class="flex items-center text-purple-600 font-semibold">
                            <span><?php echo count($cat_codes); ?> codes</span>
                            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<!-- Featured Codes Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Popular Code Examples</h2>
        <p class="text-xl text-gray-600">Get started with these frequently used codes</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php 
        $all_codes = getAllCodes();
        $featured_codes = array_slice($all_codes, 0, 6);
        foreach ($featured_codes as $code): 
            $difficulty_color = $difficulty_levels[$code['difficulty']]['color'];
        ?>
            <div class="code-card bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden">
                <div class="p-6">
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo $code['title']; ?></h3>
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
                    <p class="text-gray-600 mb-4 line-clamp-2"><?php echo $code['description']; ?></p>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php foreach (array_slice($code['tags'], 0, 3) as $tag): ?>
                            <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">
                                #<?php echo $tag; ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    
                    <a href="<?php echo getCodeUrl($code); ?>" 
                       class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700 transition">
                        View Code
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="text-center mt-10">
        <a href="<?php echo getCodesUrl(); ?>" class="inline-block bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition shadow-md">
            View All Codes
        </a>
    </div>
</div>

<!-- Features Section -->
<div class="bg-gray-100 mt-20 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose Z2M Codes?</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Well Documented</h3>
                <p class="text-gray-600">Every code includes detailed comments and explanations</p>
            </div>
            
            <div class="text-center">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Tested & Verified</h3>
                <p class="text-gray-600">All codes are tested and verified to work</p>
            </div>
            
            <div class="text-center">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Easy to Copy</h3>
                <p class="text-gray-600">One-click copy to clipboard functionality</p>
            </div>
            
            <div class="text-center">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Always Updated</h3>
                <p class="text-gray-600">Regular updates with new codes and projects</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

