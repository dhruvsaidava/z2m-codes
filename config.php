<?php
// Site Configuration
define('SITE_NAME', 'Z2M Codes');
define('SITE_DESCRIPTION', 'Your Arduino & Basic Programming Code Repository');
define('BASE_URL', 'http://localhost/z2m-codes');

// Code Categories
$categories = [
    'arduino-basics' => [
        'name' => 'Arduino Basics',
        'icon' => '🔌',
        'description' => 'Fundamental Arduino programming concepts'
    ],
    'sensors' => [
        'name' => 'Sensors',
        'icon' => '📡',
        'description' => 'Working with various sensor modules'
    ],
    'motors' => [
        'name' => 'Motors & Servos',
        'icon' => '⚙️',
        'description' => 'Control motors and servo mechanisms'
    ],
    'leds' => [
        'name' => 'LEDs & Display',
        'icon' => '💡',
        'description' => 'LED patterns and display modules'
    ],
    'iot' => [
        'name' => 'IoT Projects',
        'icon' => '🌐',
        'description' => 'Internet of Things applications'
    ],
    'communication' => [
        'name' => 'Communication',
        'icon' => '📱',
        'description' => 'Serial, I2C, SPI, Bluetooth, WiFi'
    ]
];

// Difficulty Levels
$difficulty_levels = [
    'beginner' => ['name' => 'Beginner', 'color' => 'green'],
    'intermediate' => ['name' => 'Intermediate', 'color' => 'yellow'],
    'advanced' => ['name' => 'Advanced', 'color' => 'red']
];

// Function to get all codes from data file
function getAllCodes() {
    return include 'data/codes.php';
}

// Function to get code by ID
function getCodeById($id) {
    $codes = getAllCodes();
    foreach ($codes as $code) {
        if ($code['id'] == $id) {
            return $code;
        }
    }
    return null;
}

// Function to create URL-friendly slug from title
function createSlug($text) {
    // Convert to lowercase
    $text = strtolower($text);
    // Replace non-alphanumeric characters with hyphens
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    // Remove leading/trailing hyphens
    $text = trim($text, '-');
    return $text;
}

// Function to generate clean code URL
function getCodeUrl($code) {
    $slug = createSlug($code['title']);
    return BASE_URL . '/code/' . $code['id'] . '/' . $slug;
}

// Function to generate category URL
function getCategoryUrl($categoryKey) {
    return BASE_URL . '/category/' . $categoryKey;
}

// Function to generate codes page URL
function getCodesUrl() {
    return BASE_URL . '/codes';
}

// Function to generate home URL
function getHomeUrl() {
    return BASE_URL . '/';
}

// Function to filter codes
function filterCodes($category = null, $difficulty = null, $search = null) {
    $codes = getAllCodes();
    $filtered = [];
    
    foreach ($codes as $code) {
        $match = true;
        
        if ($category && $code['category'] != $category) {
            $match = false;
        }
        
        if ($difficulty && $code['difficulty'] != $difficulty) {
            $match = false;
        }
        
        if ($search) {
            $searchLower = strtolower($search);
            $titleMatch = strpos(strtolower($code['title']), $searchLower) !== false;
            $descMatch = strpos(strtolower($code['description']), $searchLower) !== false;
            $tagsMatch = false;
            foreach ($code['tags'] as $tag) {
                if (strpos(strtolower($tag), $searchLower) !== false) {
                    $tagsMatch = true;
                    break;
                }
            }
            if (!$titleMatch && !$descMatch && !$tagsMatch) {
                $match = false;
            }
        }
        
        if ($match) {
            $filtered[] = $code;
        }
    }
    
    return $filtered;
}
?>

