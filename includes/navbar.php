<!-- Navigation Bar -->
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="<?php echo getHomeUrl(); ?>" class="flex items-center">
                    <img src="assets/images/zero2maker-logo.png" alt="<?php echo SITE_NAME; ?>" class="h-10 w-auto">
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="<?php echo getHomeUrl(); ?>" class="text-gray-700 hover:text-purple-600 font-medium transition">
                    Home
                </a>
                <a href="<?php echo getCodesUrl(); ?>" class="text-gray-700 hover:text-purple-600 font-medium transition">
                    All Codes
                </a>
                <div class="relative group">
                    <button class="text-gray-700 hover:text-purple-600 font-medium transition flex items-center">
                        Categories
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <div class="py-2">
                            <?php foreach ($categories as $cat_key => $cat): ?>
                            <a href="<?php echo getCategoryUrl($cat_key); ?>" 
                               class="block px-4 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition">
                                <span class="mr-2"><?php echo $cat['icon']; ?></span>
                                <?php echo $cat['name']; ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <div class="px-4 py-3 space-y-2">
            <a href="<?php echo getHomeUrl(); ?>" class="block text-gray-700 hover:text-purple-600 font-medium py-2">
                Home
            </a>
            <a href="<?php echo getCodesUrl(); ?>" class="block text-gray-700 hover:text-purple-600 font-medium py-2">
                All Codes
            </a>
            <div class="pt-2 pb-2">
                <p class="text-gray-500 text-sm font-semibold mb-2">Categories</p>
                <?php foreach ($categories as $cat_key => $cat): ?>
                <a href="<?php echo getCategoryUrl($cat_key); ?>" 
                   class="block text-gray-700 hover:text-purple-600 py-2 pl-4">
                    <span class="mr-2"><?php echo $cat['icon']; ?></span>
                    <?php echo $cat['name']; ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</nav>

