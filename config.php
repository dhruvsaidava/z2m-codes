<?php
// Site Configuration
define('SITE_NAME', 'Z2M Codes');
define('SITE_DESCRIPTION', 'Your Arduino & Basic Programming Code Repository');
// Auto-detect base URL for both local and online use
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['SCRIPT_NAME']);
// Normalize path for local and production
if ($path === '/' || $path === '\\' || $path === '.' || empty($path)) {
    $path = '';
} else {
    // Remove leading/trailing slashes and add single leading slash
    $path = '/' . trim($path, '/\\');
}
// Build BASE_URL
define('BASE_URL', $protocol . '://' . $host . $path);

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

// Function to generate clean code URL (by ID or slug)
function getCodeUrl($code) {
    // Use clean URL: /codes/view-code/3 or /codes/view-code/slug
    $slug = createSlug($code['title']);
    return BASE_URL . '/codes/view-code/' . $code['id'];
    // Alternative with slug: BASE_URL . '/codes/view-code/' . $slug;
    // Or use both: BASE_URL . '/codes/view-code/' . $code['id'] . '/' . $slug;
}

// Function to generate category URL (clean URL)
function getCategoryUrl($categoryKey) {
    return BASE_URL . '/category/' . $categoryKey;
}

// Function to generate difficulty URL (clean URL)
function getDifficultyUrl($difficultyKey) {
    return BASE_URL . '/difficulty/' . $difficultyKey;
}

// Function to generate search URL (clean URL)
function getSearchUrl($searchQuery) {
    return BASE_URL . '/search/' . urlencode($searchQuery);
}

// Function to generate codes page URL (clean URL)
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

// Function to get Z2M Part Number based on code title/components
function getZ2MPartNumber($code) {
    $title = strtolower($code['title']);
    $components = isset($code['components']) ? $code['components'] : [];
    
    // Component mapping based on title and components
    $mapping = [
        // Sensors
        'color sensor' => 'EMS-00012-A',
        'led matrix' => 'EMA-00004-A',
        'potentiometer' => 'EDR-00002-20K0',
        'touch detector' => 'EMS-00014-A',
        'digital temperature' => 'EMS-00007-A, EDS-00003-A',
        'light dependent resistor' => 'EMS-00017-A',
        'ldr' => 'EMS-00017-A',
        'rfid' => 'EMC-00005-A',
        'ultrasonic' => 'EMS-00005-A',
        'hc-sr04' => 'EMS-00005-A',
        'flex sensor' => 'EDT-00007-A',
        'lcd i2c' => 'EMA-00001-A',
        'rain sensor' => 'EMS-00024-A',
        'waterflow sensor' => 'EMS-017-A',
        'water flow' => 'EMS-017-A',
        'force sensitive resistance' => 'EDT-00006-A',
        'fsr' => 'EDT-00006-A',
        'membrane keypad' => 'EMS-00015-B, EMS-00015-C',
        'relay module' => 'EMA-00008-A',
        'water level sensor' => 'EMS-00018-A',
        'gas sensor' => 'EMS-00010-A to G, EDT-00001-A to G',
        '4 digit display 7 segment' => 'EMA-00007-A',
        'tm1637' => 'EMA-00007-A',
        'gprs gsm module' => 'EMC-00006-A',
        'gsm' => 'EMC-00006-A',
        'metal touch sensor' => 'EMS-00008-A',
        'rf transmitter' => 'EMC-00001-A',
        'rf receiver' => 'EMC-00001-A',
        'accelerometer' => 'EMS-00003-B',
        'heart pulse rate sensor' => 'EMS-00009-A',
        'motor driver' => 'EMA-00010-B',
        'smoke sensor' => 'EDT-00001-A to G',
        'analog temperature sensor' => 'EDS-00004-A',
        'humidity sensor' => 'EMS-00002-A / EDT-00005-A',
        'dht11' => 'EMS-00002-A / EDT-00005-A',
        'neopixel' => 'EMA-00003-B to E',
        'soil sensor' => 'EMS-00019-A',
        'soil moisture' => 'EMS-00019-A',
        'ir remote' => 'EMC-00008-A/B / EDS-00005-A',
        'nodemcu' => 'EMC-00003-A',
        'sound detector' => 'EMS-00004-B',
        'ir sensor' => 'EMS-00013-A',
        'infrared detector' => 'EMS-00013-A',
        'infrared sensor' => 'EMS-00013-A',
        'passive buzzer' => 'EMA-00006-A / EDT-00008-A',
        'sound recorder' => 'EMA-00009-A',
        'bluetooth module' => 'EMC-00004-A',
        'joystick' => 'EMS-00020-A',
        'piezoelectric sensor' => 'EMS-00022-A / EDT-00003-A',
        'sound sensor' => 'EMS-00004-A / EMS-00004-C',
        'capacitive keypad' => 'EMS-016-A',
        'laser diode' => 'EDD-00001-A',
        'pir sensor' => 'EMS-00006-A',
        'tilt sensor' => 'EMS-00021-A',
        'momentary switch' => 'EDM-00009-A',
        'momentary switch led toggle' => 'EDM-00009-A',
        'switch led toggle' => 'EDM-00009-A',
        'servo motor' => 'MMD-00002-A, MMD-00002-B',
        'servo' => 'MMD-00002-A, MMD-00002-B',
        '7 segment 1 digit' => 'EDD-00004-A, EDD-00004-B',
        'seven segment 1digit display' => 'EDD-00004-A, EDD-00004-B',
        'seven segment 1digit' => 'EDD-00004-A, EDD-00004-B',
        'seven segment' => 'EDD-00004-A, EDD-00004-B',
        '7 segment 1 digit display device' => 'EDD-00004-A, EDD-00004-B',
        '7 segment display' => 'EDD-00004-A, EDD-00004-B',
        '1 digit display' => 'EDD-00004-A, EDD-00004-B',
        '1digit display' => 'EDD-00004-A, EDD-00004-B',
        '1 digit display device' => 'EDD-00004-A, EDD-00004-B',
        'force sensitive resistor' => 'EDT-00006-A',
    ];
    
    // Check title for matches
    foreach ($mapping as $keyword => $partNumber) {
        if (strpos($title, $keyword) !== false) {
            return $partNumber;
        }
    }
    
    // Check components array for matches
    if (!empty($components)) {
        foreach ($components as $component) {
            $componentLower = strtolower($component);
            foreach ($mapping as $keyword => $partNumber) {
                if (strpos($componentLower, $keyword) !== false) {
                    return $partNumber;
                }
            }
        }
    }
    
    // Default return null if no match
    return null;
}

// Function to automatically get image path based on code title/components
function getCodeImagePath($code) {
    $title = strtolower($code['title']);
    $components = isset($code['components']) ? $code['components'] : [];
    
    // If image already exists, return it
    if (isset($code['image']) && !empty($code['image'])) {
        return $code['image'];
    }
    
    // Image mapping based on titles/components
    $imageMapping = [
        'accelerometer' => 'assets/images/Accelerometer_Readings.png',
        'analog temperature' => 'assets/images/analog temp module cirucuit.png',
        'analog temp module' => 'assets/images/analog temp module cirucuit.png',
        'analog temp breadboard' => 'assets/images/analog temp bread boardcirucuit.png',
        'temperature sensor' => 'assets/images/analog temp module cirucuit.png',
        'bluetooth' => 'assets/images/Bluetooth_Module_Control.png',
        'capacitive keypad' => 'assets/images/Capacitive_Keypad.png',
        'color sensor' => 'assets/images/color sensor.png',
        'digital temperature' => 'assets/images/digital temp module.png',
        'digital temp module' => 'assets/images/digital temp module.png',
        'digital temp breadboard' => 'assets/images/digital temp breadboard circuit.png',
        'digital temp bread board' => 'assets/images/digital temp breadboard circuit.png',
        'flex sensor' => 'assets/images/flex sensor.png',
        'force sensitive' => 'assets/images/Force_Sensitive_Resistor.png',
        'fsr' => 'assets/images/Force_Sensitive_Resistor.png',
        'gas sensor' => 'assets/images/gas sensor.png',
        'gps module' => 'assets/images/GPS_Module_Interface.png',
        'gsm' => 'assets/images/GSM_GPRS_AT_Commands.png',
        'gprs' => 'assets/images/GSM_GPRS_AT_Commands.png',
        'heart pulse' => 'assets/images/Heart_Pulse_Rate_Sensor.png',
        'humidity' => 'assets/images/humidity with resistor.png',
        'humidity with resistor' => 'assets/images/humidity with resistor.png',
        'humidity without resistor' => 'assets/images/humidity without resistor.png',
        'dht11' => 'assets/images/humidity with resistor.png',
        'dht22' => 'assets/images/humidity without resistor.png',
        'ir remote' => 'assets/images/IR_Remote_Receiver.png',
        'ir sensor' => 'assets/images/ir sensor.png',
        'infrared sensor' => 'assets/images/ir sensor.png',
        'joystick' => 'assets/images/joystick.png',
        'laser diode' => 'assets/images/Laser_Diode.png',
        'ldr' => 'assets/images/ldr module circuit.png',
        'ldr module' => 'assets/images/ldr module circuit.png',
        'ldr breadboard' => 'assets/images/ldr breadboard circuit.png',
        'ldr bread board' => 'assets/images/ldr breadboard circuit.png',
        'light dependent resistor' => 'assets/images/ldr module circuit.png',
        'light dependent resistor module' => 'assets/images/ldr module circuit.png',
        'light dependent resistor breadboard' => 'assets/images/ldr breadboard circuit.png',
        'lcd i2c' => 'assets/images/Liquid Crystal Display.png',
        'lcd' => 'assets/images/Liquid Crystal Display.png',
        'liquid crystal display' => 'assets/images/Liquid Crystal Display.png',
        'led matrix' => 'assets/images/LED_Matrix.png',
        'membrane keypad' => 'assets/images/Membrane_Keypad.png',
        'metal touch' => 'assets/images/Metal_Touch_Sensor.png',
        'momentary switch' => 'assets/images/Momentary_Switch_LED_Toggle.png',
        'momentary switch led toggle' => 'assets/images/Momentary_Switch_LED_Toggle.png',
        'switch led toggle' => 'assets/images/Momentary_Switch_LED_Toggle.png',
        'led toggle' => 'assets/images/Momentary_Switch_LED_Toggle.png',
        'nodemcu' => 'assets/images/NodeMCU_LDR_ThingSpeak.png',
        'motor driver' => 'assets/images/Motor_Driver_Control.png',
        'neopixel' => 'assets/images/NeoPixel_LED_Strip.png',
        'passive buzzer' => 'assets/images/Passive_Buzzer.png',
        'passive buzzer1' => 'assets/images/Passive_Buzzer1.png',
        'buzzer' => 'assets/images/Passive_Buzzer.png',
        'piezoelectric' => 'assets/images/Piezoelectric_Sensor.png',
        'pir sensor' => 'assets/images/PIR_Sensor.png',
        'potentiometer' => 'assets/images/Potentiometer.png',
        'rain sensor' => 'assets/images/rain sensor.png',
        'relay' => 'assets/images/Relay_Module.png',
        'rf transmitter' => 'assets/images/RF_Transmitter.png',
        'rf receiver' => 'assets/images/RF_Receiver.png',
        'rfid' => 'assets/images/RFID.png',
        'servo motor' => 'assets/images/servo motor.png',
        'servo' => 'assets/images/servo motor.png',
        'smoke sensor' => 'assets/images/smoke sensor.png',
        'soil' => 'assets/images/Soil_Moisture_Sensor.png',
        'sound detector' => 'assets/images/sound detector.png',
        'sound recorder' => 'assets/images/Sound_Recorder.png',
        'sound sensor' => 'assets/images/sound sensor.png',
        'tilt sensor' => 'assets/images/Tilt_Sensor.png',
        'touch detector' => 'assets/images/touch detector.png',
        'ultrasonic' => 'assets/images/ultrasonic sensor.png',
        'ultrasonic sensor' => 'assets/images/ultrasonic sensor.png',
        'hc-sr04' => 'assets/images/ultrasonic sensor.png',
        'water level' => 'assets/images/water level.png',
        'water flow' => 'assets/images/Water_Flow_Sensor.png',
        'waterflow sensor' => 'assets/images/Water_Flow_Sensor.png',
        '7 segment' => 'assets/images/Seven_Segment_1Digit_Display.png',
        'seven segment' => 'assets/images/Seven_Segment_1Digit_Display.png',
        'seven segment 1digit display' => 'assets/images/Seven_Segment_1Digit_Display.png',
        'seven segment 1digit' => 'assets/images/Seven_Segment_1Digit_Display.png',
        '7 segment 1 digit' => 'assets/images/Seven_Segment_1Digit_Display.png',
        '7 segment 1 digit display' => 'assets/images/Seven_Segment_1Digit_Display.png',
        'segment 1digit' => 'assets/images/Seven_Segment_1Digit_Display.png',
        'segment 1 digit' => 'assets/images/Seven_Segment_1Digit_Display.png',
        '4 digit' => 'assets/images/4 digit 7 segment.png',
        '4 digit 7 segment' => 'assets/images/4 digit 7 segment.png',
        'tm1637' => 'assets/images/4 digit 7 segment.png',
        'tm1637 4digit display' => 'assets/images/4 digit 7 segment.png',
        '4digit display' => 'assets/images/4 digit 7 segment.png',
        'water level sensor' => 'assets/images/water level.png',
        'smoke gas sensor' => 'assets/images/smoke sensor.png',
        'gas sensor module' => 'assets/images/gas sensor.png',
        'soil moisture sensor' => 'assets/images/Soil_Moisture_Sensor.png',
        'wifi web server' => 'assets/images/NodeMCU_LDR_ThingSpeak.png',
        'esp8266' => 'assets/images/NodeMCU_LDR_ThingSpeak.png',
        'nodemcu ldr thingspeak' => 'assets/images/NodeMCU_LDR_ThingSpeak.png',
        'gps module interface' => 'assets/images/GPS_Module_Interface.png',
        'gsm gprs at commands' => 'assets/images/GSM_GPRS_AT_Commands.png',
        'humidity sensor dht11' => 'assets/images/humidity with resistor.png',
        'ultrasonic led distance indicator' => 'assets/images/ultrasonic sensor.png',
        'rfid radiofrequencyidentification' => 'assets/images/RFID.png',
        'push button' => 'assets/images/Momentary_Switch_LED_Toggle.png',
        'button debouncing' => 'assets/images/Momentary_Switch_LED_Toggle.png',
    ];
    
    // Check title for matches
    foreach ($imageMapping as $keyword => $imagePath) {
        if (strpos($title, $keyword) !== false) {
            return $imagePath;
        }
    }
    
    // Check components array for matches
    if (!empty($components)) {
        foreach ($components as $component) {
            $componentLower = strtolower($component);
            foreach ($imageMapping as $keyword => $imagePath) {
                if (strpos($componentLower, $keyword) !== false) {
                    return $imagePath;
                }
            }
        }
    }
    
    // Default return empty string if no match
    return '';
}
?>

