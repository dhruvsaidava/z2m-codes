<?php
// Code Repository Data
return [
    [
        'id' => 1,
        'title' => 'Blink LED',
        'description' => 'The classic \"Hello World\" of Arduino - make an LED blink on and off.',
        'category' => 'arduino-basics',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'LED',
  1 => 'digitalWrite',
  2 => 'delay',
  3 => 'basics',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '// Blink LED Example
// Pin 13 has an LED connected on most Arduino boards

int ledPin = 13;

void setup() {
  // Initialize digital pin LED_BUILTIN as an output
  pinMode(ledPin, OUTPUT);
}

void loop() {
  digitalWrite(ledPin, HIGH);   // Turn the LED on
  delay(1000);                  // Wait for 1 second
  digitalWrite(ledPin, LOW);    // Turn the LED off
  delay(1000);                  // Wait for 1 second
}',
        'author' => 'Arduino Team',
        'date' => '2024-01-15',
        'image' => '',
    ],
    [
        'id' => 2,
        'title' => 'Serial Communication',
        'description' => 'Learn to send and receive data through the serial port for debugging and communication.',
        'category' => 'communication',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Serial',
  1 => 'Communication',
  2 => 'Debugging',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'USB Cable',
),
        'code' => '// Serial Communication Example

void setup() {
  // Initialize serial communication at 9600 baud
  Serial.begin(9600);
  Serial.println(\"Arduino Serial Communication Started!\");
}

void loop() {
  // Check if data is available to read
  if (Serial.available() > 0) {
    // Read the incoming byte
    char incomingByte = Serial.read();
    
    // Echo back what was received
    Serial.print(\"I received: \");
    Serial.println(incomingByte);
  }
  
  // Send a message every 2 seconds
  Serial.println(\"Hello from Arduino!\");
  delay(2000);
}',
        'author' => 'Z2M Codes',
        'date' => '2024-01-20',
        'image' => '',
    ],
    [
        'id' => 3,
        'title' => 'Ultrasonic Distance Sensor (HC-SR04)',
        'description' => 'Measure distance using ultrasonic sensor and display results on serial monitor.',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'HC-SR04',
  1 => 'Ultrasonic',
  2 => 'Distance',
  3 => 'Sensor',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'HC-SR04 Ultrasonic Sensor',
  2 => 'Jumper Wires',
),
        'code' => '// Ultrasonic Distance Sensor Example
// HC-SR04 Sensor

const int trigPin = 9;
const int echoPin = 10;

long duration;
int distance;

void setup() {
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  Serial.begin(9600);
  Serial.println(\"Ultrasonic Distance Sensor\");
}

void loop() {
  // Clear the trigPin
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  
  // Set trigPin HIGH for 10 microseconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  // Read the echoPin, returns sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  
  // Calculate distance (Speed of sound = 343 m/s)
  distance = duration * 0.034 / 2;
  
  // Display distance on Serial Monitor
  Serial.print(\"Distance: \");
  Serial.print(distance);
  Serial.println(\" cm\");
  
  delay(500);
}',
        'author' => 'Z2M Codes',
        'date' => '2024-02-01',
        'image' => 'assets/images/ultrasonic sensor.png',
    ],
    [
        'id' => 4,
        'title' => 'DHT11 Temperature & Humidity Sensor',
        'description' => 'Read temperature and humidity data from DHT11 sensor module.',
        'category' => 'sensors',
        'difficulty' => 'intermediate',
        'tags' => array (
  0 => 'DHT11',
  1 => 'Temperature',
  2 => 'Humidity',
  3 => 'Sensor',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'DHT11 Sensor',
  2 => '10kΩ Resistor',
  3 => 'Jumper Wires',
),
        'code' => '// DHT11 Temperature & Humidity Sensor
// Install DHT sensor library first: Sketch -> Include Library -> Manage Libraries -> DHT sensor library

#include <DHT.h>

#define DHTPIN 2        // Pin connected to DHT sensor
#define DHTTYPE DHT11   // DHT 11

DHT dht(DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(9600);
  Serial.println(\"DHT11 Temperature & Humidity Sensor\");
  dht.begin();
}

void loop() {
  // Wait a few seconds between measurements
  delay(2000);
  
  // Read humidity
  float humidity = dht.readHumidity();
  // Read temperature in Celsius
  float temperature = dht.readTemperature();
  // Read temperature in Fahrenheit
  float temperatureF = dht.readTemperature(true);
  
  // Check if readings failed
  if (isnan(humidity) || isnan(temperature) || isnan(temperatureF)) {
    Serial.println(\"Failed to read from DHT sensor!\");
    return;
  }
  
  // Display results
  Serial.print(\"Humidity: \");
  Serial.print(humidity);
  Serial.print(\" %  \");
  Serial.print(\"Temperature: \");
  Serial.print(temperature);
  Serial.print(\" °C  \");
  Serial.print(temperatureF);
  Serial.println(\" °F\");
}',
        'author' => 'Z2M Codes',
        'date' => '2024-02-10',
        'image' => 'assets/images/humidity with resistor.png',
    ],
    [
        'id' => 5,
        'title' => 'Servo Motor Control',
        'description' => 'Control a servo motor to rotate to specific angles using PWM signals.',
        'category' => 'motors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Servo',
  1 => 'Motor',
  2 => 'PWM',
  3 => 'Control',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Servo Motor (SG90)',
  2 => 'Jumper Wires',
  3 => 'External Power (optional)',
),
        'code' => '// Servo Motor Control Example
#include <Servo.h>

Servo myServo;  // Create servo object

int servoPin = 9;

void setup() {
  myServo.attach(servoPin);  // Attach servo to pin 9
  Serial.begin(9600);
  Serial.println(\"Servo Motor Control\");
}

void loop() {
  // Sweep from 0 to 180 degrees
  for (int angle = 0; angle <= 180; angle++) {
    myServo.write(angle);
    Serial.print(\"Angle: \");
    Serial.println(angle);
    delay(15);
  }
  
  delay(500);
  
  // Sweep back from 180 to 0 degrees
  for (int angle = 180; angle >= 0; angle--) {
    myServo.write(angle);
    Serial.print(\"Angle: \");
    Serial.println(angle);
    delay(15);
  }
  
  delay(500);
}',
        'author' => 'Z2M Codes',
        'date' => '2024-02-15',
        'image' => 'assets/images/servo motor.png',
    ],
    [
        'id' => 6,
        'title' => 'RGB LED Color Mixing',
        'description' => 'Control RGB LED to produce different colors using PWM on three pins.',
        'category' => 'leds',
        'difficulty' => 'intermediate',
        'tags' => array (
  0 => 'RGB',
  1 => 'LED',
  2 => 'PWM',
  3 => 'Colors',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'RGB LED',
  2 => '3x 220Ω Resistors',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '// RGB LED Color Mixing
// Common Cathode RGB LED

int redPin = 9;
int greenPin = 10;
int bluePin = 11;

void setup() {
  pinMode(redPin, OUTPUT);
  pinMode(greenPin, OUTPUT);
  pinMode(bluePin, OUTPUT);
}

void loop() {
  // Red
  setColor(255, 0, 0);
  delay(1000);
  
  // Green
  setColor(0, 255, 0);
  delay(1000);
  
  // Blue
  setColor(0, 0, 255);
  delay(1000);
  
  // Yellow
  setColor(255, 255, 0);
  delay(1000);
  
  // Cyan
  setColor(0, 255, 255);
  delay(1000);
  
  // Magenta
  setColor(255, 0, 255);
  delay(1000);
  
  // White
  setColor(255, 255, 255);
  delay(1000);
  
  // Purple
  setColor(128, 0, 128);
  delay(1000);
}

void setColor(int red, int green, int blue) {
  analogWrite(redPin, red);
  analogWrite(greenPin, green);
  analogWrite(bluePin, blue);
}',
        'author' => 'Z2M Codes',
        'date' => '2024-02-20',
        'image' => '',
    ],
    [
        'id' => 7,
        'title' => 'Push Button with Debouncing',
        'description' => 'Read button input with proper debouncing technique to avoid false triggers.',
        'category' => 'arduino-basics',
        'difficulty' => 'intermediate',
        'tags' => array (
  0 => 'Button',
  1 => 'Input',
  2 => 'Debouncing',
  3 => 'Digital Read',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Push Button',
  2 => '10kΩ Resistor',
  3 => 'LED',
  4 => '220Ω Resistor',
  5 => 'Breadboard',
),
        'code' => '// Push Button with Debouncing
// Toggles LED on each button press

const int buttonPin = 2;
const int ledPin = 13;

int ledState = LOW;
int buttonState;
int lastButtonState = LOW;

unsigned long lastDebounceTime = 0;
unsigned long debounceDelay = 50;  // 50ms debounce time

void setup() {
  pinMode(buttonPin, INPUT);
  pinMode(ledPin, OUTPUT);
  digitalWrite(ledPin, ledState);
  Serial.begin(9600);
}

void loop() {
  int reading = digitalRead(buttonPin);
  
  // If button state changed, reset debounce timer
  if (reading != lastButtonState) {
    lastDebounceTime = millis();
  }
  
  // Check if enough time has passed
  if ((millis() - lastDebounceTime) > debounceDelay) {
    // If button state has changed
    if (reading != buttonState) {
      buttonState = reading;
      
      // Only toggle LED if button is pressed (HIGH)
      if (buttonState == HIGH) {
        ledState = !ledState;
        digitalWrite(ledPin, ledState);
        Serial.println(\"Button Pressed - LED Toggled\");
      }
    }
  }
  
  lastButtonState = reading;
}',
        'author' => 'Z2M Codes',
        'date' => '2024-03-01',
        'image' => '',
    ],
    [
        'id' => 8,
        'title' => 'WiFi Web Server (ESP8266/NodeMCU)',
        'description' => 'Create a simple web server to control LED over WiFi using ESP8266.',
        'category' => 'iot',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'ESP8266',
  1 => 'WiFi',
  2 => 'Web Server',
  3 => 'IoT',
  4 => 'NodeMCU',
),
        'components' => array (
  0 => 'ESP8266/NodeMCU',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Micro USB Cable',
),
        'code' => '// WiFi Web Server for ESP8266/NodeMCU
#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>

// WiFi credentials
const char* ssid = \"YOUR_WIFI_SSID\";
const char* password = \"YOUR_WIFI_PASSWORD\";

ESP8266WebServer server(80);
int ledPin = D1;  // Use D1 pin on NodeMCU
bool ledState = false;

void setup() {
  Serial.begin(115200);
  pinMode(ledPin, OUTPUT);
  digitalWrite(ledPin, LOW);
  
  // Connect to WiFi
  Serial.println(\"Connecting to WiFi...\");
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(\".\");
  }
  
  Serial.println(\"\");
  Serial.println(\"WiFi connected!\");
  Serial.print(\"IP address: \");
  Serial.println(WiFi.localIP());
  
  // Define server routes
  server.on(\"/\", handleRoot);
  server.on(\"/led/on\", handleLEDOn);
  server.on(\"/led/off\", handleLEDOff);
  
  server.begin();
  Serial.println(\"HTTP server started\");
}

void loop() {
  server.handleClient();
}

void handleRoot() {
  String html = \"<html><body>\";
  html += \"<h1>ESP8266 LED Control</h1>\";
  html += \"<p>LED Status: \" + String(ledState ? \"ON\" : \"OFF\") + \"</p>\";
  html += \"<a href=\'/led/on\'><button>Turn ON</button></a>\";
  html += \"<a href=\'/led/off\'><button>Turn OFF</button></a>\";
  html += \"</body></html>\";
  server.send(200, \"text/html\", html);
}

void handleLEDOn() {
  ledState = true;
  digitalWrite(ledPin, HIGH);
  Serial.println(\"LED turned ON\");
  server.sendHeader(\"Location\", \"/\");
  server.send(303);
}

void handleLEDOff() {
  ledState = false;
  digitalWrite(ledPin, LOW);
  Serial.println(\"LED turned OFF\");
  server.sendHeader(\"Location\", \"/\");
  server.send(303);
}',
        'author' => 'Z2M Codes',
        'date' => '2024-03-15',
        'image' => '',
    ],
    [
        'id' => 9,
        'title' => 'Ultrasonic Sensor (Distance Indication with LED)',
        'description' => 'Use ultrasonic sensor to measure distance and control LEDs based on proximity. Red LED turns on when object is close (< 4cm), green LED turns on when object is far.',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'HC-SR04',
  1 => 'Ultrasonic',
  2 => 'Distance',
  3 => 'LED',
  4 => 'Proximity',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'HC-SR04 Ultrasonic Sensor',
  2 => 'Red LED',
  3 => 'Green LED',
  4 => '2x 220Ω Resistors',
  5 => 'Breadboard',
  6 => 'Jumper Wires',
),
        'code' => '#define trigPin 11
#define echoPin 12
#define RedLed 13
#define greenLed 3

void setup() {
  Serial.begin (9600);
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  pinMode(RedLed, OUTPUT);
  pinMode(greenLed, OUTPUT);
}

void loop() {
  long duration, distance;
  digitalWrite(trigPin, LOW); 
  delayMicroseconds(2); 
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10); 
  digitalWrite(trigPin, LOW);
  duration = pulseIn(echoPin, HIGH);
  distance = (duration/2) / 29.1;
  
  if (distance < 4) {  // This is where the RED LED On/Off happens
      digitalWrite(RedLed,HIGH); // When the Red condition is met, the Green LED should turn off
      digitalWrite(greenLed,LOW);
  }
  else {
         digitalWrite(RedLed,LOW);
         digitalWrite(greenLed,HIGH);
  }
  
   
  if (distance >= 200 || distance <= 0){
      Serial.println(\"Out of range\");
  }
  else {
        Serial.print(distance);
        Serial.println(\" cm\");
  }
  delay(500);
}',
        'author' => 'Zero2Maker',
        'date' => '2024-10-15',
        'image' => 'assets/images/ultrasonic sensor.png',
    ],
    [
        'id' => 10,
        'title' => 'Accelerometer Readings',
        'description' => 'Project: Accelerometer Readings (Analog) Description:',
        'category' => 'sensors',
        'difficulty' => 'intermediate',
        'tags' => array (
  0 => 'Accelerometer',
  1 => 'Readings',
  2 => 'Led',
  3 => 'Serial',
  4 => 'Analog',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Accelerometer Readings (Analog)
  Description:
    - Reads X, Y, Z analog values from an accelerometer.
    - Scales and prints the readings as both raw values and approximate G-force.
*/

const int xInput = A0;
const int yInput = A1;
const int zInput = A2;

int RawMin = 0;
int RawMax = 1023;
const int sampleSize = 10;

void setup() {
  analogReference(EXTERNAL);  // Use external reference (if connected)
  Serial.begin(9600);
}

void loop() {
  // Read inputs for X, Y, and Z axes
  int xRaw = ReadAxis(xInput);
  int yRaw = ReadAxis(yInput);
  int zRaw = ReadAxis(zInput);

  // Scale raw values to ±3g range
  long xScaled = map(xRaw, RawMin, RawMax, -3000, 3000);
  long yScaled = map(yRaw, RawMin, RawMax, -3000, 3000);
  long zScaled = map(zRaw, RawMin, RawMax, -3000, 3000);

  // Convert to G-force (approximate)
  float xAccel = xScaled / 1000.0;
  float yAccel = yScaled / 1000.0;
  float zAccel = zScaled / 1000.0;

  // Display values on Serial Monitor
  Serial.print(\"X, Y, Z :: \");
  Serial.print(xRaw);
  Serial.print(\", \");
  Serial.print(yRaw);
  Serial.print(\", \");
  Serial.print(zRaw);
  Serial.print(\" :: \");
  Serial.print(xAccel, 1);
  Serial.print(\"G, \");
  Serial.print(yAccel, 1);
  Serial.print(\"G, \");
  Serial.print(zAccel, 1);
  Serial.println(\"G\");

  delay(200);
}

// Function to read and average multiple samples for stable output
int ReadAxis(int axisPin) {
  long total = 0;
  for (int i = 0; i < sampleSize; i++) {
    total += analogRead(axisPin);
  }
  return total / sampleSize;
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Accelerometer_Readings.png',
    ],
    [
        'id' => 11,
        'title' => 'Analog Temperature Sensor',
        'description' => 'Project: Analog Temperature Sensor (e.g., LM35) Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Analog',
  1 => 'Temperature',
  2 => 'Sensor',
  3 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Jumper Wires',
  2 => 'Breadboard',
),
        'code' => '/*
  Project: Analog Temperature Sensor (e.g., LM35)
  Description:
    - Reads analog temperature data from sensor connected to A0.
    - Converts the reading to degrees Celsius and prints it to Serial Monitor.
*/

int tempsensor = A0;  // Connect sensor output to A0

void setup() {
  pinMode(tempsensor, INPUT); // Set temperature sensor pin as input
  Serial.begin(9600);         // Start serial communication
}

void loop() {
  float val = analogRead(tempsensor);  // Read sensor value (0–1023)
  float celc = (val * 500.0) / 1024.0; // Convert analog value to °C

  Serial.println(\"\");
  Serial.print(\"deg Celsius = \");
  Serial.println(celc);
  Serial.println(\"\");

  delay(1000); // Wait for 1 second before next reading
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/analog temp module cirucuit.png',
    ],
    [
        'id' => 12,
        'title' => 'Bluetooth Module Control',
        'description' => 'Project: Bluetooth Module Control Description:',
        'category' => 'communication',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Bluetooth',
  1 => 'Module',
  2 => 'Control',
  3 => 'Led',
  4 => 'Motor',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Bluetooth Module Control
  Description:
    - Receives commands via Bluetooth (e.g., from Z2M Bluetooth RC App).
    - Controls onboard LED on pin 13 based on received characters.
    - Commands:
        \'F\' - Turn LED ON
        \'B\' - Turn LED OFF
    - Extendable for controlling servos, motors, etc.
*/

char data = 0; // Variable to store received data

void setup() {
  Serial.begin(9600);     // Initialize serial communication
  pinMode(13, OUTPUT);    // Set LED pin as output
}

void loop() {
  // Check if data is received via Bluetooth
  if (Serial.available() > 0) {
    data = Serial.read();   // Read incoming data
    Serial.println(data);   // Print received data to Serial Monitor

    // Control LED based on received command
    if (data == \'F\') {
      digitalWrite(13, HIGH);  // Turn LED ON
    }
    else if (data == \'B\') {
      digitalWrite(13, LOW);   // Turn LED OFF
    }
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Bluetooth_Module_Control.png',
    ],
    [
        'id' => 13,
        'title' => 'Capacitive Keypad',
        'description' => 'Project: Capacitive Touch Keypad Description:',
        'category' => 'arduino-basics',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Capacitive',
  1 => 'Keypad',
  2 => 'Serial',
  3 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Touch Sensor',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Capacitive Touch Keypad
  Description:
    - Reads key presses from a 16-key capacitive keypad.
    - Outputs the pressed key number to the Serial Monitor.
*/

#define SCL_PIN 8  // Clock pin
#define SDO_PIN 9  // Data pin

byte Key; // Variable to store detected key state

void setup() {
  Serial.begin(9600);     // Initialize Serial Monitor
  pinMode(SCL_PIN, OUTPUT); // Set clock pin as output
  pinMode(SDO_PIN, INPUT);  // Set data pin as input
}

void loop() {
  // Read keypad state
  Key = Read_Keypad();

  // If a key is pressed, print its number
  if (Key) {
    Serial.print(\"Key Pressed: \");
    Serial.println(Key);
  }

  // Small delay to avoid flooding Serial Monitor
  delay(100);
}

// Function to read keypad state
byte Read_Keypad(void) {
  byte Count;
  byte Key_State = 0;

  // Pulse the clock pin 16 times (for 16 keys)
  for (Count = 1; Count <= 16; Count++) {
    digitalWrite(SCL_PIN, LOW);

    // If the data pin is LOW, store current key number (active low mode)
    if (!digitalRead(SDO_PIN)) {
      Key_State = Count;
    }

    digitalWrite(SCL_PIN, HIGH);
  }

  return Key_State; // Return detected key number
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Capacitive_Keypad.png',
    ],
    [
        'id' => 14,
        'title' => 'Color Sensor',
        'description' => 'Project: Color Sensor (TCS3200 / TCS230) Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Color',
  1 => 'Sensor',
  2 => 'Arduino',
  3 => 'Serial',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Color Sensor Module',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Color Sensor (TCS3200 / TCS230)
  Description:
    - Detects color frequencies using TCS3200 color sensor.
    - Reads and prints frequency values for Red, Green, and Blue components.
*/

#define S0 5      // S0 pin connected to Arduino pin 5
#define S1 6      // S1 pin connected to Arduino pin 6
#define S2 7      // S2 pin connected to Arduino pin 7
#define S3 8      // S3 pin connected to Arduino pin 8
#define sensor 9  // Output from sensor connected to Arduino pin 9

int frequency = 0;  // Variable to store frequency readings

void setup() {
  pinMode(S0, OUTPUT);
  pinMode(S1, OUTPUT);
  pinMode(S2, OUTPUT);
  pinMode(S3, OUTPUT);
  pinMode(sensor, INPUT);

  // Set frequency scaling to 20%
  digitalWrite(S0, HIGH);
  digitalWrite(S1, LOW);

  Serial.begin(9600);
  Serial.println(\"TCS3200 Color Sensor Test Initialized\");
}

void loop() {
  // Read RED component
  digitalWrite(S2, LOW);
  digitalWrite(S3, LOW);
  frequency = pulseIn(sensor, LOW);
  Serial.print(\"R = \");
  Serial.print(frequency);
  Serial.print(\" \");

  delay(100);

  // Read GREEN component
  digitalWrite(S2, HIGH);
  digitalWrite(S3, HIGH);
  frequency = pulseIn(sensor, LOW);
  Serial.print(\"G = \");
  Serial.print(frequency);
  Serial.print(\" \");

  delay(100);

  // Read BLUE component
  digitalWrite(S2, LOW);
  digitalWrite(S3, HIGH);
  frequency = pulseIn(sensor, LOW);
  Serial.print(\"B = \");
  Serial.print(frequency);
  Serial.println(\" \");

  delay(200);
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/color sensor.png',
    ],
    [
        'id' => 15,
        'title' => 'Digital Temperature Sensor',
        'description' => 'Project: Digital Temperature Sensor (DS18B20) Description:',
        'category' => 'sensors',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Digital',
  1 => 'Temperature',
  2 => 'Sensor',
  3 => 'Arduino',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Jumper Wires',
  2 => 'Breadboard',
),
        'code' => '/*
  Project: Digital Temperature Sensor (DS18B20)
  Description:
    - Reads temperature data from DS18B20 sensor using OneWire and DallasTemperature libraries.
    - Displays temperature in Celsius on the Serial Monitor.
*/

#include <OneWire.h>
#include <DallasTemperature.h>

// Data wire connected to pin A0 on the Arduino
#define ONE_WIRE_BUS A0

// Setup a OneWire instance to communicate with any OneWire devices
OneWire oneWire(ONE_WIRE_BUS);

// Pass the OneWire reference to Dallas Temperature sensor library
DallasTemperature sensors(&oneWire);

void setup() {
  Serial.begin(9600);   // Initialize Serial Monitor
  sensors.begin();      // Start the DS18B20 sensor
}

void loop() {
  sensors.requestTemperatures(); // Request temperature data from the sensor

  // Print temperature in Celsius
  Serial.print(\"Temperature is: \");
  Serial.print(sensors.getTempCByIndex(0));
  Serial.println(\" °C\");

  delay(200); // Short delay between readings
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/digital temp module.png',
    ],
    [
        'id' => 16,
        'title' => 'Flex Sensor',
        'description' => 'Project: Flex Sensor Description:',
        'category' => 'sensors',
        'difficulty' => 'intermediate',
        'tags' => array (
  0 => 'Flex',
  1 => 'Sensor',
  2 => 'Led',
  3 => 'Serial',
  4 => 'Analog',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Flex Sensor
  Description:
    - Reads bending from a flex sensor connected to analog pin A0.
    - Maps analog values to angle (0–180°) and controls an LED when bent beyond 90°.
*/

#define led_Pin 7   // LED connected to pin 7
#define sensor A0   // Flex sensor connected to A0

int analog_value;   // Variable to store analog reading
int angle_value;    // Variable to store calculated angle

void setup() {
  pinMode(led_Pin, OUTPUT);  // Set LED pin as output
  Serial.begin(9600);        // Initialize Serial Monitor
}

void loop() {
  // Read analog value from flex sensor
  analog_value = analogRead(sensor);

  // Map analog value range (700–900) to angle range (0–180)
  angle_value = map(analog_value, 700, 900, 0, 180);

  // Print readings to Serial Monitor
  Serial.print(\"Analog: \");
  Serial.println(analog_value);
  Serial.print(\"Angle: \");
  Serial.println(angle_value);

  // Turn on LED if flex angle > 90°, else turn off
  if (angle_value > 90) {
    digitalWrite(led_Pin, HIGH);
  } else {
    digitalWrite(led_Pin, LOW);
  }

  delay(1000); // Wait 1 second before next reading
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/flex sensor.png',
    ],
    [
        'id' => 17,
        'title' => 'Force Sensitive Resistor',
        'description' => 'Project: Force Sensitive Resistor (FSR) Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Force',
  1 => 'Sensitive',
  2 => 'Resistor',
  3 => 'Sensor',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Force Sensitive Resistor',
  2 => '10kΩ Resistor',
  3 => 'Jumper Wires',
),
        'code' => '/*
  Project: Force Sensitive Resistor (FSR)
  Description:
    - Measures applied pressure using a force-sensitive resistor connected to A0.
    - Displays pressure level on the Serial Monitor (no, light, medium, or high pressure).
*/

int pressureAnalogPin = A0;  // Analog pin connected to FSR
int pressureReading;         // Variable to store analog reading

// Thresholds for different pressure levels (adjust as needed)
int noPressure = 0;
int lightPressure = 200;
int mediumPressure = 700;

void setup(void) {
  Serial.begin(9600);  // Initialize Serial Monitor
  Serial.println(\"FSR Pressure Sensor Initialized...\");
}

void loop(void) {
  // Read analog data from FSR sensor
  pressureReading = analogRead(pressureAnalogPin);

  // Print raw sensor value
  Serial.print(\"Pressure Pad Reading = \");
  Serial.println(pressureReading);

  // Determine and display pressure level
  if (pressureReading <= noPressure) {
    Serial.println(\" - No Pressure\");
  } else if (pressureReading < lightPressure) {
    Serial.println(\" - Light Pressure\");
  } else if (pressureReading < mediumPressure) {
    Serial.println(\" - Medium Pressure\");
  } else {
    Serial.println(\" - High Pressure\");
  }

  delay(1000); // Wait 1 second between readings
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Force_Sensitive_Resistor.png',
    ],
    [
        'id' => 18,
        'title' => 'GPS Module Interface',
        'description' => 'Project: GPS Module Serial Interface Description:',
        'category' => 'sensors',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Gps',
  1 => 'Module',
  2 => 'Interface',
  3 => 'Arduino',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'RF Transmitter',
  2 => 'RF Receiver',
  3 => 'Jumper Wires',
),
        'code' => '/*
  Project: GPS Module Serial Interface
  Description:
    - Reads data from GPS module (e.g., NEO-6M)
    - Forwards GPS serial data to Arduino Serial Monitor
*/

#include <SoftwareSerial.h>

int RXPin = 4;  // Receiver pin (connected to TX of GPS module)
int TXPin = 3;  // Transmitter pin (connected to RX of GPS module)
int GPSBaud = 9600;  // GPS communication baud rate

// Create a software serial port named \'gpsSerial\'
SoftwareSerial gpsSerial(RXPin, TXPin);

void setup() {
  Serial.begin(9600);       // Start Serial Monitor
  gpsSerial.begin(GPSBaud); // Start communication with GPS module
}

void loop() {
  // Continuously read and forward GPS data to Serial Monitor
  while (gpsSerial.available() > 0) {
    Serial.write(gpsSerial.read());
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/GPS_Module_Interface.png',
    ],
    [
        'id' => 19,
        'title' => 'GSM GPRS AT Commands',
        'description' => '#include <SoftwareSerial.h> Project: GPRS GSM Module Basic AT Command Test',
        'category' => 'communication',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Gsm',
  1 => 'Gprs',
  2 => 'Commands',
  3 => 'Arduino',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'GSM Module',
  2 => 'SIM Card',
  3 => 'Jumper Wires',
),
        'code' => '#include <SoftwareSerial.h>

/*
  Project: GPRS GSM Module Basic AT Command Test
  Description:
    - Communicates with GSM module via SoftwareSerial
    - Sends basic AT commands for connection testing
*/

SoftwareSerial mySerial(3, 2); // Tx -> Arduino #3, Rx -> #2

void setup() {
  Serial.begin(9600);
  mySerial.begin(9600);

  mySerial.println(\"AT\");           // Handshake test (Expect \"OK\")
  updateSerial();

  mySerial.println(\"AT+CSQ\");       // Signal quality test (0–31)
  updateSerial();

  mySerial.println(\"AT+CCID\");      // Check SIM presence
  updateSerial();

  mySerial.println(\"AT+CREG?\");     // Check network registration
  updateSerial();
}

void loop() {
  updateSerial();
}

void updateSerial() {
  while (Serial.available()) {
    mySerial.write(Serial.read());   // Forward Serial data to GSM module
  }
  while (mySerial.available()) {
    Serial.write(mySerial.read());   // Forward GSM data to Serial Monitor
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/GSM_GPRS_AT_Commands.png',
    ],
    [
        'id' => 20,
        'title' => 'Gas Sensor Module',
        'description' => 'Project: Gas Sensor (Smoke Detector) Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Gas',
  1 => 'Sensor',
  2 => 'Module',
  3 => 'Led',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Gas Sensor (Smoke Detector)
  Description:
    - Detects gas/smoke concentration using an analog gas sensor (e.g., MQ-2, MQ-135).
    - Lights up an LED when gas level exceeds a defined threshold.
*/

#define led 12     // LED connected to pin 12
#define smoke A5   // Gas sensor connected to analog pin A5

int threshold = 400; // Threshold limit for smoke detection

void setup() {
  pinMode(led, OUTPUT);   // Set LED pin as output
  pinMode(smoke, INPUT);  // Set smoke sensor pin as input
  Serial.begin(9600);     // Initialize serial communication
  Serial.println(\"Gas Sensor Module Initialized...\");
}

void loop() {
  int value = analogRead(smoke); // Read analog sensor value
  Serial.print(\"Sensor Reading: \");
  Serial.println(value);         // Display reading on Serial Monitor

  if (value > threshold) {
    digitalWrite(led, HIGH);     // Turn ON LED if gas concentration exceeds threshold
    Serial.println(\"Status: Smoke Detected!\");
  } else {
    digitalWrite(led, LOW);      // Turn OFF LED if safe
    Serial.println(\"Status: Air Clear.\");
  }

  delay(1000); // Wait for 1 second before next reading
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/gas sensor.png',
    ],
    [
        'id' => 21,
        'title' => 'Heart Pulse Rate Sensor',
        'description' => 'Project: Heart Pulse Rate Sensor Reference: https://pulsesensor.com/pages/code-and-guide',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Heart',
  1 => 'Pulse',
  2 => 'Rate',
  3 => 'Sensor',
  4 => 'Led',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Heart Pulse Rate Sensor
  Reference: https://pulsesensor.com/pages/code-and-guide
  Description:
    - Reads pulse signal from Pulse Sensor connected to Analog Pin A0.
    - Lights up onboard LED (Pin 13) when a beat is detected.
*/

int PulseSensorPurplePin = 0;  // Pulse Sensor purple wire connected to A0
int LED13 = 13;                // Onboard LED pin

// Variables for pulse detection
int Signal;                    // Holds the analog signal value
int Threshold = 510;           // Threshold value to detect heartbeat

void setup() {
  pinMode(LED13, OUTPUT);      // LED pin as output
  Serial.begin(9600);          // Begin serial communication
}

void loop() {
  // Read pulse sensor value
  Signal = analogRead(PulseSensorPurplePin);

  // Print the analog value to Serial Monitor
  Serial.println(Signal);

  // Compare signal to threshold to detect heartbeat
  if (Signal > Threshold) {
    digitalWrite(LED13, HIGH); // Turn ON LED when beat detected
  } else {
    digitalWrite(LED13, LOW);  // Turn OFF LED when no beat
  }

  delay(10); // Small delay for stable readings
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Heart_Pulse_Rate_Sensor.png',
    ],
    [
        'id' => 22,
        'title' => 'Humidity Sensor DHT11',
        'description' => 'Project: Humidity and Temperature Sensor (DHT11) Description:',
        'category' => 'sensors',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Humidity',
  1 => 'Sensor',
  2 => 'Dht11',
  3 => 'Led',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Humidity and Temperature Sensor (DHT11)
  Description:
    - Reads temperature (°C) and humidity (%RH) from DHT11 sensor.
    - Displays values on Serial Monitor.
*/

#include <SimpleDHT.h>

// Define DHT11 pin and object
int pinDHT11 = 7;
SimpleDHT11 dht11(pinDHT11);

void setup() {
  Serial.begin(9600);  // Initialize Serial Monitor
}

void loop() {
  Serial.println(\"=================================\");
  Serial.println(\"Reading from DHT11 Sensor...\");

  // Variables to store readings
  byte temperature = 0;
  byte humidity = 0;
  int err = SimpleDHTErrSuccess;

  // Read data from sensor and handle errors
  if ((err = dht11.read(&temperature, &humidity, NULL)) != SimpleDHTErrSuccess) {
    Serial.print(\"Read DHT11 failed, err=\");
    Serial.println(err);
    delay(1000);
    return;
  }

  // If successful, print values
  Serial.print(\"Sample OK: \");
  Serial.print((int)temperature);
  Serial.print(\" °C, \");
  Serial.print((int)humidity);
  Serial.println(\" RH\");

  // Wait before next reading
  delay(1500);
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/humidity without resistor.png',
    ],
    [
        'id' => 23,
        'title' => 'IR Remote Receiver',
        'description' => 'Project: IR Remote Receiver Description:',
        'category' => 'sensors',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Remote',
  1 => 'Receiver',
  2 => 'Led',
  3 => 'Serial',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: IR Remote Receiver
  Description:
    - Reads infrared signals from an IR remote using an IR receiver module.
    - Displays the hexadecimal code for each button pressed on the Serial Monitor.
*/

#include <IRremote.h>

const int RECV_PIN = 7;   // IR Receiver connected to digital pin 7
IRrecv irrecv(RECV_PIN);  // Create IR receiver object
decode_results results;   // Variable to store decoded results

void setup() {
  Serial.begin(9600);     // Initialize Serial Monitor
  irrecv.enableIRIn();    // Start IR receiver
  irrecv.blink13(true);   // Blink onboard LED when signal is received
}

void loop() {
  // Check if IR signal is received
  if (irrecv.decode(&results)) {
    // Print the received IR code in HEX format
    Serial.println(results.value, HEX);
    irrecv.resume();  // Prepare to receive the next signal
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/IR_Remote_Receiver.png',
    ],
    [
        'id' => 24,
        'title' => 'Infrared Detector',
        'description' => 'Project: Infrared (IR) Obstacle Detector Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Infrared',
  1 => 'Detector',
  2 => 'Sensor',
  3 => 'Led',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Infrared (IR) Obstacle Detector
  Description:
    - Detects presence of objects using an infrared sensor.
    - Turns ON an LED when an obstacle is detected.
*/

int sensorinput = 4;  // Digital pin connected to IR sensor output
int ledoutput = 11;   // Pin connected to LED

void setup() {
  pinMode(ledoutput, OUTPUT);  // Set LED pin as output
  pinMode(sensorinput, INPUT); // Set sensor pin as input
  Serial.begin(9600);          // Initialize Serial Monitor
}

void loop() {
  int value = digitalRead(sensorinput);  // Read sensor output
  Serial.println(value);                 // Print sensor value to Serial Monitor

  if (value == LOW) {                    // If sensor detects object (LOW signal)
    digitalWrite(ledoutput, HIGH);       // Turn ON LED
    delay(100);                          // Small delay for visibility
  } else {
    digitalWrite(ledoutput, LOW);        // Turn OFF LED
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/ir sensor.png',
    ],
    [
        'id' => 25,
        'title' => 'LCD I2C Display',
        'description' => 'Project: Liquid Crystal Display (LCD) with I2C Interface Description:',
        'category' => 'leds',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Lcd',
  1 => 'I2c',
  2 => 'Display',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LCD I2C Display',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Liquid Crystal Display (LCD) with I2C Interface
  Description:
    - Displays messages on a 16x2 I2C LCD module.
    - Uses LiquidCrystal_I2C library for easy communication.
*/

#include <Wire.h>
#include <LiquidCrystal_I2C.h>

// Set the LCD address to 0x27 for a 16x2 display
LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup() {
  lcd.begin();      // Initialize the LCD
  lcd.backlight();  // Turn on the backlight
}

void loop() {
  // Set cursor to column 3, row 1 (second line)
  lcd.setCursor(3, 1);
  lcd.print(\"Zero2Maker!\");

  // Set cursor to column 4, row 0 (first line)
  lcd.setCursor(4, 0);
  lcd.print(\"I feel happy!\");

  delay(1000);  // Display for 1 second

  // Clear the LCD display
  lcd.clear();
  delay(500);
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Liquid Crystal Display.png',
    ],
    [
        'id' => 26,
        'title' => 'LDR Sensor',
        'description' => 'Project: Light Dependent Resistor (LDR) Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Ldr',
  1 => 'Sensor',
  2 => 'Serial',
  3 => 'Analog',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LDR (Light Dependent Resistor)',
  2 => '10kΩ Resistor',
  3 => 'Jumper Wires',
),
        'code' => '/*
  Project: Light Dependent Resistor (LDR)
  Description:
    - Reads the light intensity using an LDR connected to analog pin A0.
    - Displays the sensor value on the Serial Monitor.
*/

int LDR = A0;   // LDR connected to analog pin A0
int LDRVal;     // Variable to store LDR reading

void setup() {
  pinMode(LDR, INPUT);   // Set LDR pin as input
  Serial.begin(9600);    // Initialize Serial Monitor
}

void loop() {
  LDRVal = analogRead(LDR);   // Read value from LDR
  Serial.print(\"LDR Value: \");
  Serial.println(LDRVal);     // Print the value to Serial Monitor
  delay(100);                 // Wait a little before the next reading
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/ldr module circuit.png',
    ],
    [
        'id' => 27,
        'title' => 'LED Matrix',
        'description' => 'Project: LED Matrix Display (MAX7219) Description:',
        'category' => 'leds',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Led',
  1 => 'Matrix',
  2 => 'Spi',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: LED Matrix Display (MAX7219)
  Description:
    - Displays characters \"Z\", \"II\", and \"M\" sequentially on an 8x8 LED matrix.
    - Uses the LedControl library.
*/

#include <LedControl.h>

int DIN = 12;  // Data In pin
int CS = 11;   // Chip Select pin
int CLK = 10;  // Clock pin

// Binary pattern for \"Z\"
byte z[8] = {
  B11111111,
  B11111111,
  B00001110,
  B00011100,
  B00111000,
  B01110000,
  B11111111,
  B11111111
};

// Hex values for \"II\" and \"M\"
byte II[8] = {0x7C, 0x7C, 0x0C, 0x7C, 0x7C, 0x60, 0x7C, 0x7C};
byte m[8] = {0x81, 0xC3, 0xA5, 0x99, 0x81, 0x81, 0x81, 0x81};

// Initialize LED control object: LedControl(dataPin, clockPin, csPin, numDevices)
LedControl lc = LedControl(DIN, CLK, CS, 1);

void setup() {
  // Wake up MAX72XX from power-saving mode
  lc.shutdown(0, false);

  // Set brightness level (0–15)
  lc.setIntensity(0, 8);

  // Clear display at startup
  lc.clearDisplay(0);
}

void loop() {
  printByte(z);
  delay(1000);
  printByte(II);
  delay(1000);
  printByte(m);
  delay(1000);
}

// Function to display an 8x8 pattern
void printByte(byte character[8]) {
  for (int i = 0; i < 8; i++) {
    lc.setRow(0, i, character[i]);
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/LED_Matrix.png',
    ],
    [
        'id' => 28,
        'title' => 'Laser Diode',
        'description' => 'Project: Laser Diode Control Description:',
        'category' => 'leds',
        'difficulty' => 'intermediate',
        'tags' => array (
  0 => 'Laser',
  1 => 'Diode',
  2 => 'Pwm',
  3 => 'Analog',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Laser Diode Module',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Laser Diode Control
  Description:
    - Turns a laser diode ON and OFF periodically.
    - Gradually increases the intensity using PWM.
*/

int laserPin = 10; // Laser diode connected to pin 10

void setup() {
  pinMode(laserPin, OUTPUT); // Set pin as output
}

void loop() {
  // Turn ON laser for 0.5 seconds
  digitalWrite(laserPin, HIGH);
  delay(500);

  // Turn OFF laser for 0.5 seconds
  digitalWrite(laserPin, LOW);
  delay(500);

  // Gradually increase laser intensity (PWM 0–255)
  int i = 0;
  while (i <= 255) {
    analogWrite(laserPin, i); // Set intensity
    delay(50);                // Wait for smooth fade
    i += 5;                   // Increment intensity
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Laser_Diode.png',
    ],
    [
        'id' => 29,
        'title' => 'Membrane Keypad',
        'description' => 'Project: Membrane Keypad (4x4) Description:',
        'category' => 'arduino-basics',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Membrane',
  1 => 'Keypad',
  2 => 'Arduino',
  3 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Keypad',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Membrane Keypad (4x4)
  Description:
    - Reads input from a 4x4 membrane keypad.
    - Displays pressed keys on the Serial Monitor.
    - Works with EMS-0016-B and EMS-0016-C keypads.
*/

#include <Keypad.h>

// Define number of rows and columns
const byte ROWS = 4;
const byte COLS = 4;

// Define keypad layout
char keys[ROWS][COLS] = {
  {\'1\', \'2\', \'3\', \'A\'},
  {\'4\', \'5\', \'6\', \'B\'},
  {\'7\', \'8\', \'9\', \'C\'},
  {\'*\', \'0\', \'#\', \'D\'}
};

// Connect keypad row and column pins to Arduino
byte rPins[ROWS] = {10, 9, 8, 7}; // Row pins
byte cPins[COLS] = {6, 5, 4, 3};  // Column pins

// Create Keypad object
Keypad keypad = Keypad(makeKeymap(keys), rPins, cPins, ROWS, COLS);

void setup() {
  Serial.begin(9600); // Initialize Serial Monitor
  Serial.println(\"Membrane Keypad Initialized. Press a key...\");
}

void loop() {
  char key = keypad.getKey(); // Read key press

  // If a key is pressed, display it on the Serial Monitor
  if (key) {
    Serial.print(\"Key Pressed: \");
    Serial.println(key);
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Membrane_Keypad.png',
    ],
    [
        'id' => 30,
        'title' => 'Metal Touch Sensor',
        'description' => 'Project: Metal Touch Sensor Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Metal',
  1 => 'Touch',
  2 => 'Sensor',
  3 => 'Serial',
  4 => 'Analog',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Touch Sensor',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Metal Touch Sensor
  Description:
    - Reads analog and digital values from a metal touch sensor
    - Displays voltage and touch detection status on Serial Monitor
*/

int AInput = A0; // Analog input from sensor
int DInput = 3;  // Digital input from sensor

void setup() {
  pinMode(AInput, INPUT); // Set pin for analog input
  pinMode(DInput, INPUT); // Set pin for digital input
  Serial.begin(9600);     // Begin Serial communication at 9600 baud
}

void loop() {
  float analogValue;  // Variable for analog reading (voltage)
  int digitalValue;   // Variable for digital reading (touch status)

  // Read analog value and convert it to voltage (0–5V)
  analogValue = analogRead(AInput) * (5.0 / 1023.0);

  // Read digital value from sensor (0 or 1)
  digitalValue = digitalRead(DInput);

  // Display results on Serial Monitor
  Serial.print(\"Analog voltage value: \");
  Serial.print(analogValue);
  Serial.print(\"V, \");

  Serial.print(\"Touch input: \");
  if (digitalValue == 1) {
    Serial.println(\"detected\");
  } else {
    Serial.println(\"not detected\");
  }

  Serial.println(\"---------------------\");
  delay(250);
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Metal_Touch_Sensor.png',
    ],
    [
        'id' => 31,
        'title' => 'Momentary Switch LED Toggle',
        'description' => 'Project: Momentary Switch LED Toggle Description:',
        'category' => 'leds',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Momentary',
  1 => 'Switch',
  2 => 'Led',
  3 => 'Toggle',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Momentary Switch LED Toggle
  Description:
    - Toggles an LED on/off each time the push button is pressed.
    - Uses internal pull-up resistor for stable input.
*/

int led = 13;
int button = 4;

/* Initialize LED and button states */
int ledState = LOW;
int buttonCurrent;
int buttonPrevious = HIGH;

void setup() {
  pinMode(button, INPUT_PULLUP); // Use internal pull-up resistor
  pinMode(led, OUTPUT);          // LED as output
  Serial.begin(9600);            // Start serial monitor for debugging
}

void loop() {
  // Read current button state
  buttonCurrent = digitalRead(button);

  // Detect button press (transition from LOW to HIGH)
  if (buttonCurrent == HIGH && buttonPrevious == LOW) {
    ledState = !ledState; // Toggle LED state
  }

  // Print button state to serial monitor
  Serial.println(buttonCurrent);

  // Update previous button state
  buttonPrevious = buttonCurrent;

  // Apply LED state
  digitalWrite(led, ledState);

  delay(200); // Simple debounce delay
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Momentary_Switch_LED_Toggle.png',
    ],
    [
        'id' => 32,
        'title' => 'Motor Driver Control',
        'description' => 'Project: Motor Driver (L293D / L298N Basic Control) Description:',
        'category' => 'motors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Motor',
  1 => 'Driver',
  2 => 'Control',
  3 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Motor Driver Module',
  2 => 'DC Motor',
  3 => 'Jumper Wires',
),
        'code' => '/*
  Project: Motor Driver (L293D / L298N Basic Control)
  Description:
    - Controls two DC motors via motor driver.
    - Moves motors forward for 1 second and backward for 1 second repeatedly.
*/

// Define Motor Driver pins
const int A_1A = 4; // Left Motor Forward
const int A_1B = 5; // Left Motor Backward
const int B_1A = 6; // Right Motor Forward
const int B_1B = 7; // Right Motor Backward

void setup() {
  // Set all motor control pins as output
  pinMode(A_1A, OUTPUT);
  pinMode(A_1B, OUTPUT);
  pinMode(B_1A, OUTPUT);
  pinMode(B_1B, OUTPUT);
}

void loop() {
  // Move Forward
  digitalWrite(A_1A, HIGH);
  digitalWrite(A_1B, LOW);
  digitalWrite(B_1A, HIGH);
  digitalWrite(B_1B, LOW);
  delay(1000);

  // Move Backward
  digitalWrite(A_1A, LOW);
  digitalWrite(A_1B, HIGH);
  digitalWrite(B_1A, LOW);
  digitalWrite(B_1B, HIGH);
  delay(1000);
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Motor_Driver_Control.png',
    ],
    [
        'id' => 33,
        'title' => 'NeoPixel LED Strip',
        'description' => 'Project: NeoPixel LED Strip (Adafruit NeoPixel Library) Description:',
        'category' => 'leds',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Neopixel',
  1 => 'Led',
  2 => 'Strip',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: NeoPixel LED Strip (Adafruit NeoPixel Library)
  Description:
    - Controls an 8-LED NeoPixel strip.
    - Lights LEDs one by one in green color with a short delay.
*/

#include <Adafruit_NeoPixel.h>
#ifdef __AVR__
  #include <avr/power.h>
#endif

// Define pin connected to NeoPixel data line
#define PIN 6

// Define number of NeoPixels
#define NUMPIXELS 8

// Create NeoPixel object
Adafruit_NeoPixel pixels = Adafruit_NeoPixel(NUMPIXELS, PIN, NEO_GRB + NEO_KHZ800);

// Delay between lighting each pixel (in milliseconds)
int delayval = 500;

void setup() {
  // Initialize NeoPixel library
  pixels.begin();
}

void loop() {
  // Loop through each pixel in the strip
  for (int i = 0; i < NUMPIXELS; i++) {
    // Set pixel color (RGB: 0,150,0 -> moderate green)
    pixels.setPixelColor(i, pixels.Color(0, 150, 0));

    // Send updated color data to strip
    pixels.show();

    // Wait before lighting next pixel
    delay(delayval);
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/NeoPixel_LED_Strip.png',
    ],
    [
        'id' => 34,
        'title' => 'NodeMCU LDR ThingSpeak',
        'description' => 'Project: NodeMCU LDR Data Logging to ThingSpeak Description:',
        'category' => 'sensors',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Nodemcu',
  1 => 'Ldr',
  2 => 'Thingspeak',
  3 => 'Sensor',
  4 => 'Wifi',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LDR (Light Dependent Resistor)',
  2 => '10kΩ Resistor',
  3 => 'Jumper Wires',
),
        'code' => '/*
  Project: NodeMCU LDR Data Logging to ThingSpeak
  Description:
    - Reads light intensity using LDR sensor connected to A0.
    - Sends data to ThingSpeak channel via WiFi.
*/

#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ThingSpeak.h>

// Replace with your WiFi credentials
const char* ssid = \"Your_SSID_Here\";       // WiFi Name
const char* password = \"Your_Password_Here\"; // WiFi Password

// ThingSpeak credentials
unsigned long myChannelNumber = YYYYYY;     // Replace with your ThingSpeak Channel Number
const char* myWriteAPIKey = \"XXXXXXXXXXXXXXX\"; // Replace with your Write API Key

// Sensor configuration
int LDRpin = A0;   // LDR sensor connected to A0 pin
int value = 0;     // Variable to store LDR reading

WiFiClient client;

void setup() {
  Serial.begin(9600);
  delay(10);

  Serial.println(\"Connecting to WiFi...\");
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(\".\");
  }

  Serial.println(\"\");
  Serial.println(\"WiFi connected\");
  Serial.print(\"IP address: \");
  Serial.println(WiFi.localIP());

  ThingSpeak.begin(client);
}

void loop() {
  value = analogRead(LDRpin);  // Read LDR sensor value
  Serial.print(\"LDR Value: \");
  Serial.println(value);

  // Send data to ThingSpeak
  int response = ThingSpeak.writeField(myChannelNumber, 1, value, myWriteAPIKey);

  if (response == 200) {
    Serial.println(\"Data sent to ThingSpeak successfully.\");
  } else {
    Serial.print(\"Error sending data. HTTP error code: \");
    Serial.println(response);
  }

  delay(15000); // ThingSpeak allows updates every 15 seconds
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/NodeMCU_LDR_ThingSpeak.png',
    ],
    [
        'id' => 35,
        'title' => 'PIR Sensor',
        'description' => 'Project: PIR Motion Sensor Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Pir',
  1 => 'Sensor',
  2 => 'Led',
  3 => 'Serial',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: PIR Motion Sensor
  Description:
    - Detects motion using a PIR sensor.
    - Turns on an LED when motion is detected.
*/

int sensorinput = 2;   // PIR sensor connected to digital pin 2
int ledoutput = 12;    // LED connected to digital pin 12

void setup() {
  pinMode(ledoutput, OUTPUT);  // Set LED pin as output
  pinMode(sensorinput, INPUT); // Set sensor pin as input
  Serial.begin(9600);          // Initialize Serial Monitor
}

void loop() {
  int value = digitalRead(sensorinput);  // Read PIR sensor output
  Serial.println(value);                 // Print sensor reading for debugging

  if (value == HIGH) {                   // If motion detected
    digitalWrite(ledoutput, HIGH);       // Turn ON LED
    delay(100);                          // Short delay for visibility
  } else {
    digitalWrite(ledoutput, LOW);        // Turn OFF LED
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/PIR_Sensor.png',
    ],
    [
        'id' => 36,
        'title' => 'Passive Buzzer',
        'description' => 'Project: Passive Buzzer Police Siren Description:',
        'category' => 'arduino-basics',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Passive',
  1 => 'Buzzer',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Passive Buzzer',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Passive Buzzer Police Siren
  Description:
    - Generates a two-tone alternating siren effect using a passive buzzer.
*/

int buzzer = 11;  // Buzzer connected to pin 11

void setup() {
  // No pinMode needed, tone() handles it automatically
}

void loop() {
  // Tone(pin, frequency in Hz, duration in ms)
  tone(buzzer, 440, 500);  // Play note A4 (440 Hz) for 500 ms
  delay(700);              // Wait 700 ms before next tone
  tone(buzzer, 880, 500);  // Play note A5 (880 Hz) for 500 ms
  delay(700);              // Wait 700 ms before repeating
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Passive_Buzzer.png',
    ],
    [
        'id' => 37,
        'title' => 'Piezoelectric Sensor',
        'description' => 'Project: Piezoelectric Sensor Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Piezoelectric',
  1 => 'Sensor',
  2 => 'Led',
  3 => 'Serial',
  4 => 'Analog',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Piezoelectric Sensor
  Description:
    - Detects vibration or knock using a piezoelectric sensor.
    - Turns on onboard LED when vibration exceeds a threshold value.
*/

int piezo_out = A0;   // Piezo sensor connected to analog pin A0
int led_out = 13;     // LED connected to pin 13
int threshold = 100;  // Threshold for vibration detection

void setup() {
  pinMode(led_out, OUTPUT);  // Set LED as output
  Serial.begin(9600);        // Initialize Serial Monitor
}

void loop() {
  int value = analogRead(piezo_out);  // Read analog value from piezo sensor
  Serial.println(value);              // Print sensor value to Serial Monitor

  if (value >= threshold) {           // If vibration exceeds threshold
    digitalWrite(led_out, HIGH);      // Turn ON LED
  } else {
    digitalWrite(led_out, LOW);       // Turn OFF LED
  }

  delay(100); // Short delay for stability
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Piezoelectric_Sensor.png',
    ],
    [
        'id' => 38,
        'title' => 'Potentiometer',
        'description' => 'Project: Potentiometer LED Blink Control Description:',
        'category' => 'arduino-basics',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Potentiometer',
  1 => 'Sensor',
  2 => 'Led',
  3 => 'Serial',
  4 => 'Analog',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Potentiometer LED Blink Control
  Description:
    - Reads analog value from a potentiometer connected to A3.
    - Controls LED blink speed on pin 13 based on potentiometer input.
*/

int potPin = A3;  // Potentiometer connected to A3
int ledPin = 13;  // LED connected to pin 13
int val = 0;      // Variable to store sensor value

void setup() {
  pinMode(ledPin, OUTPUT);  // Set LED pin as output
  Serial.begin(9600);       // Initialize Serial Monitor
}

void loop() {
  val = analogRead(potPin); // Read value from potentiometer (0–1023)
  Serial.print(\"Potentiometer Value: \");
  Serial.println(val);

  digitalWrite(ledPin, HIGH); // Turn LED ON
  delay(val);                 // Wait for time based on potentiometer value
  digitalWrite(ledPin, LOW);  // Turn LED OFF
  delay(val);                 // Wait again for same duration
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Potentiometer.png',
    ],
    [
        'id' => 39,
        'title' => 'RFID RadioFrequencyIdentification',
        'description' => 'Project: RFID Reader (MFRC522) Description:',
        'category' => 'communication',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Rfid',
  1 => 'Radiofrequencyidentification',
  2 => 'Serial',
  3 => 'Spi',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'RF Transmitter',
  2 => 'RF Receiver',
  3 => 'Jumper Wires',
),
        'code' => '/*
  Project: RFID Reader (MFRC522)
  Description:
    - Reads RFID cards using MFRC522 (RC522) module.
    - Prints UID and checks for authorized UID.
    - Requires MFRC522 library (install via Library Manager or add zip).
*/

#include <SPI.h>
#include <MFRC522.h>

// Set pin numbers for SDA (SS) and RST of RFID module
#define SDA_PIN 10
#define RST_PIN 9

MFRC522 mfrc522(SDA_PIN, RST_PIN); // Create MFRC522 instance

void setup() {
  // Initialize serial communication, SPI bus, and MFRC522 module
  Serial.begin(9600);
  while (!Serial); // Wait for Serial (for boards that need it)
  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println(\"Scan a card near the reader...\");
  Serial.println();
}

void loop() {
  // Look for new cards
  if (!mfrc522.PICC_IsNewCardPresent()) {
    return;
  }

  // Select one of the cards
  if (!mfrc522.PICC_ReadCardSerial()) {
    return;
  }

  // Show UID on Serial Monitor
  Serial.print(\"UID tag :\");
  String content = \"\";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? \" 0\" : \" \");
    Serial.print(mfrc522.uid.uidByte[i], HEX);
    content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? \" 0\" : \" \"));
    content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  Serial.println();
  Serial.print(\"Message : \");
  content.toUpperCase();
  Serial.println(content);

  // Check authorized UID(s) - change the string below to match your card\'s UID
  if (content.substring(1) == \"8D 97 E7 2B\") {
    Serial.println(\"Authorized access\");
    Serial.println();
    delay(3000);
  } else {
    Serial.println(\"Access denied\");
    delay(3000);
  }

  // Halt PICC (optional) and stop encryption on PCD
  mfrc522.PICC_HaltA();
  mfrc522.PCD_StopCrypto1();
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/RFID.png',
    ],
    [
        'id' => 40,
        'title' => 'RF Receiver',
        'description' => 'Project: RF Receiver Description:',
        'category' => 'communication',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Receiver',
  1 => 'Led',
  2 => 'Serial',
  3 => 'Spi',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: RF Receiver
  Description:
    - Uses 433 MHz RF Receiver module
    - Listens for messages and prints them to Serial Monitor
*/

#include <RH_ASK.h>
#include <SPI.h> // Required for compilation

// Create RF driver object
RH_ASK driver;

void setup() {
  Serial.begin(9600);
  if (!driver.init())
    Serial.println(\"RF Receiver init failed\");
  else
    Serial.println(\"RF Receiver ready\");
}

void loop() {
  uint8_t buf[32];      // Buffer for received data
  uint8_t buflen = sizeof(buf);

  if (driver.recv(buf, &buflen)) {  // Non-blocking receive
    Serial.print(\"Message received: \");
    Serial.println((char*)buf);
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/RF_Receiver.png',
    ],
    [
        'id' => 41,
        'title' => 'RF Transmitter',
        'description' => 'Project: RF Transmitter Description:',
        'category' => 'communication',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Transmitter',
  1 => 'Led',
  2 => 'Serial',
  3 => 'Spi',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: RF Transmitter
  Description:
    - Uses 433 MHz RF Transmitter module
    - Sends a simple \"Hello World!\" message every second
*/

#include <RH_ASK.h>
#include <SPI.h> // Required for compilation

// Create RF driver object
RH_ASK driver;

void setup() {
  Serial.begin(9600);
  if (!driver.init())
    Serial.println(\"RF Transmitter init failed\");
  else
    Serial.println(\"RF Transmitter ready\");
}

void loop() {
  const char *msg = \"Hello World!\";
  driver.send((uint8_t *)msg, strlen(msg));
  driver.waitPacketSent();
  Serial.println(\"Message sent: Hello World!\");
  delay(1000);
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/RF_Transmitter.png',
    ],
    [
        'id' => 42,
        'title' => 'Rain Sensor',
        'description' => 'Project: Rain Sensor Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Rain',
  1 => 'Sensor',
  2 => 'Serial',
  3 => 'Analog',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Water Level Sensor',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Rain Sensor
  Description:
    - Reads digital and analog values from a rain sensor.
    - Displays the moisture status (wet/dry) and analog readings on the Serial Monitor.
*/

const int Digvalue = 2;  // Digital output pin from rain sensor
const int Analogval = A1; // Analog output pin from rain sensor

int val_analog; // Variable to store analog reading

void setup() {
  pinMode(Digvalue, INPUT);
  pinMode(Analogval, INPUT);
  Serial.begin(9600); // Initialize Serial Monitor at 9600 baud
}

void loop() {
  // Check digital rain detection status
  if (digitalRead(Digvalue) == LOW) {
    Serial.println(\"Digital value : wet\");  // When sensor detects water
    delay(12);
  } else {
    Serial.println(\"Digital value : dry\");  // When sensor detects no water
    delay(12);
  }

  // Read analog value from rain sensor
  val_analog = analogRead(Analogval);
  Serial.print(\"Analog value : \");
  Serial.println(val_analog);  // Display analog moisture value
  Serial.println(\"\");

  delay(1000); // Wait for 1 second before next reading
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/rain sensor.png',
    ],
    [
        'id' => 43,
        'title' => 'Relay Module',
        'description' => 'Project: Relay Module with PIR Sensor Description:',
        'category' => 'motors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Relay',
  1 => 'Module',
  2 => 'Sensor',
  3 => 'Serial',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'PIR Motion Sensor',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Relay Module with PIR Sensor
  Description:
    - Controls a relay based on motion detected by a PIR sensor.
    - When motion is detected, relay turns ON; otherwise, it turns OFF.
*/

#define relay 12  // Relay signal pin connected to pin 12
#define pir 11    // PIR sensor connected to pin 11

void setup() {
  pinMode(relay, OUTPUT);  // Set relay pin as output
  pinMode(pir, INPUT);     // Set PIR sensor pin as input

  digitalWrite(relay, LOW); // Initialize relay in OFF (Normally Open) state
  Serial.begin(9600);
  Serial.println(\"Relay Module Initialized. Waiting for motion...\");
}

void loop() {
  int pir_value = digitalRead(pir); // Read PIR sensor value

  if (pir_value == HIGH) {          // Motion detected
    digitalWrite(relay, HIGH);      // Turn ON relay
    Serial.println(\"Motion detected - Relay ON\");
  }
  else {                            // No motion detected
    digitalWrite(relay, LOW);       // Turn OFF relay
    Serial.println(\"No motion - Relay OFF\");
  }

  delay(200); // Small delay for stability
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Relay_Module.png',
    ],
    [
        'id' => 44,
        'title' => 'Servo Motor Control',
        'description' => 'Project: Servo Motor Control Description:',
        'category' => 'motors',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Servo',
  1 => 'Motor',
  2 => 'Control',
  3 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Servo Motor (SG90)',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Servo Motor Control
  Description:
    - Controls a servo motor connected to pin 9.
    - Moves the servo from 0° to 180° and back continuously.
*/

#include <Servo.h>

// Create a Servo object
Servo myservo;

// Create a variable for angle
int ang;

void setup() {
  // Attach servo signal pin to digital pin 9
  myservo.attach(9);
}

void loop() {
  // Move servo from 0° to 180°
  for (ang = 0; ang <= 180; ang += 1) {
    myservo.write(ang);  // Set servo angle
    delay(15);           // Wait 15 ms for servo to reach position
  }

  // Move servo from 180° back to 0°
  for (ang = 180; ang >= 0; ang -= 1) {
    myservo.write(ang);
    delay(15);
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/servo motor.png',
    ],
    [
        'id' => 45,
        'title' => 'Seven Segment 1Digit Display',
        'description' => 'Project: 7-Segment 1-Digit Display (Common Cathode) Description:',
        'category' => 'leds',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Seven',
  1 => 'Segment',
  2 => '1digit',
  3 => 'Display',
  4 => 'Led',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: 7-Segment 1-Digit Display (Common Cathode)
  Description:
    - Displays numbers 0, 1, 2, 3 sequentially on a single 7-segment LED display.
    - For Common Anode display, reverse 1’s and 0’s in digitalWrite statements.
*/

int f = 13;
int g = 12;
int e = 11;
int d = 10;
int c = 9;
int b = 8;
int a = 7;

void setup() {
  // Set all segment pins as output
  pinMode(f, OUTPUT);
  pinMode(g, OUTPUT);
  pinMode(e, OUTPUT);
  pinMode(d, OUTPUT);
  pinMode(c, OUTPUT);
  pinMode(b, OUTPUT);
  pinMode(a, OUTPUT);
}

void loop() {
  // Display character \"0\"
  digitalWrite(a, 1);
  digitalWrite(b, 1);
  digitalWrite(c, 1);
  digitalWrite(d, 1);
  digitalWrite(e, 1);
  digitalWrite(f, 1);
  digitalWrite(g, 0);
  delay(1000);

  // Display character \"1\"
  digitalWrite(a, 0);
  digitalWrite(b, 1);
  digitalWrite(c, 1);
  digitalWrite(d, 0);
  digitalWrite(e, 0);
  digitalWrite(f, 0);
  digitalWrite(g, 0);
  delay(1000);

  // Display character \"2\"
  digitalWrite(a, 1);
  digitalWrite(b, 1);
  digitalWrite(c, 0);
  digitalWrite(d, 1);
  digitalWrite(e, 1);
  digitalWrite(f, 0);
  digitalWrite(g, 1);
  delay(1000);

  // Display character \"3\"
  digitalWrite(a, 1);
  digitalWrite(b, 1);
  digitalWrite(c, 1);
  digitalWrite(d, 1);
  digitalWrite(e, 0);
  digitalWrite(f, 0);
  digitalWrite(g, 1);
  delay(1000);
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Seven_Segment_1Digit_Display.png',
    ],
    [
        'id' => 46,
        'title' => 'Smoke Gas Sensor',
        'description' => 'Project: Smoke / Gas Sensor Detection Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Smoke',
  1 => 'Gas',
  2 => 'Sensor',
  3 => 'Led',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Smoke / Gas Sensor Detection
  Description:
    - Reads analog value from MQ-series gas/smoke sensor.
    - Turns on LED when smoke/gas concentration exceeds threshold.
*/

#define led 12       // Connect LED to pin 12
#define smoke A5     // Connect sensor analog output to A5

int threshold = 400; // Threshold for smoke detection

void setup() {
  pinMode(led, OUTPUT);   // Set LED as output
  pinMode(smoke, INPUT);  // Set smoke sensor as input
  Serial.begin(9600);     // Start serial communication
}

void loop() {
  int value = analogRead(smoke);  // Read sensor value
  Serial.println(value);          // Print sensor reading to Serial Monitor

  // Check if smoke level exceeds threshold
  if (value > threshold) {
    digitalWrite(led, HIGH);      // Turn LED ON (smoke detected)
  } else {
    digitalWrite(led, LOW);       // Turn LED OFF (no smoke)
  }

  delay(1000); // Wait 1 second before next reading
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/smoke sensor.png',
    ],
    [
        'id' => 47,
        'title' => 'Soil Moisture Sensor',
        'description' => 'Project: Soil Moisture Sensor Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Soil',
  1 => 'Moisture',
  2 => 'Sensor',
  3 => 'Led',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Soil Moisture Sensor
  Description:
    - Reads soil moisture level using an analog sensor.
    - Turns on red LED when soil is dry (low moisture).
    - Turns on green LED when soil is moist (adequate water level).
*/

#define red 6     // Connect red LED to pin 6
#define green 7   // Connect green LED to pin 7
int sensor = A0;  // Connect soil sensor analog output to A0

int threshold = 400; // Threshold for moisture detection

void setup() {
  pinMode(red, OUTPUT);
  pinMode(green, OUTPUT);
  pinMode(sensor, INPUT);
  Serial.begin(9600);
}

void loop() {
  int value = analogRead(sensor);  // Read soil moisture sensor value
  Serial.println(value);           // Print sensor value to Serial Monitor

  if (value > threshold) {
    digitalWrite(red, HIGH);       // Soil dry -> red LED ON
    digitalWrite(green, LOW);      // Turn green LED OFF
  } else {
    digitalWrite(green, HIGH);     // Soil moist -> green LED ON
    digitalWrite(red, LOW);        // Turn red LED OFF
  }

  delay(1000); // Wait 1 second before next reading
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Soil_Moisture_Sensor.png',
    ],
    [
        'id' => 48,
        'title' => 'Sound Detector',
        'description' => 'Project: Sound Detector Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Sound',
  1 => 'Detector',
  2 => 'Sensor',
  3 => 'Led',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Sound Detector
  Description:
    - Detects sound using a digital sound sensor.
    - Turns on an LED when sound is detected.
*/

const int led = 11;   // LED connected to pin 11
const int sound = 7;  // Sound sensor output connected to pin 7
int soundVal = 0;     // Variable to store sensor reading

void setup() {
  pinMode(led, OUTPUT);  // Set LED pin as OUTPUT
  pinMode(sound, INPUT); // Set sound sensor pin as INPUT
}

void loop() {
  soundVal = digitalRead(sound);  // Read sound sensor value

  if (soundVal == LOW) {          // Check if sound is detected (LOW signal)
    digitalWrite(led, HIGH);      // Turn ON LED
  } else {
    digitalWrite(led, LOW);       // Turn OFF LED
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/sound detector.png',
    ],
    [
        'id' => 49,
        'title' => 'Sound Recorder',
        'description' => 'Project: Sound Recorder Module Control Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Sound',
  1 => 'Recorder',
  2 => 'Led',
  3 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Sound Recorder Module Control
  Description:
    - Controls a sound recording and playback module (e.g., ISD1820).
    - Records for 5 seconds on startup, then repeatedly plays back the recording.
*/

int rec = 2;   // Record control pin
int play = 3;  // Playback control pin

void setup() {
  // Set Record and Playback pins as output
  pinMode(rec, OUTPUT);
  pinMode(play, OUTPUT);

  // Ensure both Record and Playback are OFF initially
  digitalWrite(rec, LOW);
  digitalWrite(play, LOW);

  // Record for 5 seconds (Red LED ON while recording)
  digitalWrite(rec, HIGH);
  delay(5000);         // Recording duration
  digitalWrite(rec, LOW);
  delay(1000);         // Wait before playback
}

void loop() {
  // Play back the recording repeatedly (Red LED blinks during playback)
  digitalWrite(play, HIGH);
  delay(100);          // Short pulse to trigger playback
  digitalWrite(play, LOW);
  delay(5000);         // Wait 5 seconds between playbacks
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Sound_Recorder.png',
    ],
    [
        'id' => 50,
        'title' => 'Sound Sensor',
        'description' => 'Project: Sound Sensor with LED Brightness Control Description:',
        'category' => 'sensors',
        'difficulty' => 'intermediate',
        'tags' => array (
  0 => 'Sound',
  1 => 'Sensor',
  2 => 'Led',
  3 => 'Serial',
  4 => 'Analog',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Sound Sensor with LED Brightness Control
  Description:
    - Reads analog input from a sound sensor connected to A0.
    - Adjusts LED brightness on pin 11 based on sound intensity.
*/

const int led = 11;   // LED connected to pin 11
const int sound = A0; // Sound sensor connected to A0

int soundVal = 0;     // Variable to store sound sensor reading
int bright;           // Variable to store calculated brightness

void setup() {
  pinMode(led, OUTPUT);   // Set LED pin as output
  pinMode(sound, INPUT);  // Set sound sensor pin as input
  Serial.begin(9600);     // Initialize Serial Monitor
}

void loop() {
  // Read analog value from sound sensor
  soundVal = analogRead(sound);

  // Print sound value to Serial Monitor
  Serial.print(\"soundVal = \");
  Serial.println(soundVal);

  // Map sound value range (adjust 516 as baseline background noise)
  bright = map(soundVal, 516, 1023, 0, 255);
  bright = max(0, bright); // Prevent negative values

  // Adjust LED brightness based on sound level
  analogWrite(led, bright);

  // Delay for 0.2 seconds
  delay(200);
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/sound sensor.png',
    ],
    [
        'id' => 51,
        'title' => 'TM1637 4Digit Display',
        'description' => 'Project: 7-Segment 4-Digit Display Example Module: TM1637 4-Digit Display',
        'category' => 'leds',
        'difficulty' => 'advanced',
        'tags' => array (
  0 => 'Tm1637',
  1 => '4digit',
  2 => 'Display',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => '7-Segment Display',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: 7-Segment 4-Digit Display Example
  Module: TM1637 4-Digit Display
  Library: TM1637Display
  Description:
    - Counts from 0 to 100
    - Displays temperature (e.g., 24°C)
*/

#include <TM1637Display.h>

/* Define the connection pins */
#define CLK 2
#define DIO 3

/* Create display object */
TM1637Display display = TM1637Display(CLK, DIO);

/* Create degree Celsius symbol */
const uint8_t celsius[] = {
  SEG_A | SEG_B | SEG_F | SEG_G,  // Circle for degree symbol
  SEG_A | SEG_D | SEG_E | SEG_F   // C
};

void setup() {
  /* Clear the display */
  display.clear();
  delay(1000);
}

void loop() {
  /* Set brightness (0–7) */
  display.setBrightness(4);

  /* Show counter from 0 to 100 */
  for (int i = 0; i <= 100; i++) {
    display.showNumberDec(i);
    delay(50);
  }

  delay(1000);
  display.clear();

  /* Display temperature as example */
  int temperature = 24;

  /*
    display.showNumberDec(arg_1, arg_2, arg_3, arg_4)
      arg_1 -> Number of type integer (up to 9999)
      arg_2 -> True/false: Display leading zeroes
      arg_3 -> Number of digits to display
      arg_4 -> Position of the least significant digit (0 = leftmost)
  */
  display.showNumberDec(temperature, false, 2, 0);

  /*
    display.setSegments(arg_1, arg_2, arg_3)
      arg_1 -> Segment information
      arg_2 -> Number of digits to modify (0–4)
      arg_3 -> Position from which to print (0 = leftmost)
  */
  display.setSegments(celsius, 2, 2);

  delay(1000);

  /* Stop program */
  while (1);
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/4 digit 7 segment.png',
    ],
    [
        'id' => 52,
        'title' => 'Tilt Sensor',
        'description' => 'Project: Tilt Sensor Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Tilt',
  1 => 'Sensor',
  2 => 'Led',
  3 => 'Serial',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Tilt Sensor
  Description:
    - Detects tilt or orientation change using a tilt sensor.
    - Turns ON LED when the sensor is tilted (HIGH state).
*/

const int LED = 13;  // LED connected to pin 13
const int Tilt = 2;  // Tilt sensor connected to pin 2
int val = 0;         // Variable to store sensor value

void setup() {
  pinMode(LED, OUTPUT);  // Set LED pin as output
  pinMode(Tilt, INPUT);  // Set tilt sensor pin as input
  Serial.begin(9600);    // Initialize Serial Monitor
}

void loop() {
  val = digitalRead(Tilt);  // Read digital value from tilt sensor
  Serial.println(val);      // Print sensor value to Serial Monitor

  if (val == HIGH) {        // If tilt is detected
    digitalWrite(LED, HIGH); // Turn ON LED
  } else {
    digitalWrite(LED, LOW);  // Turn OFF LED
  }
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Tilt_Sensor.png',
    ],
    [
        'id' => 53,
        'title' => 'Touch Detector',
        'description' => 'Project: Touch Detector Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Touch',
  1 => 'Detector',
  2 => 'Sensor',
  3 => 'Serial',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Touch Sensor',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Touch Detector
  Description:
    - Detects touch input using a digital touch sensor connected to pin 3.
    - Displays \"TOUCHED\" or \"not touched\" on the Serial Monitor.
*/

int touch = 3; // Touch sensor connected to digital pin 3

void setup() {
  Serial.begin(9600);     // Initialize Serial Monitor
  pinMode(touch, INPUT);  // Set touch pin as input
}

void loop() {
  int touchval = digitalRead(touch); // Read value from touch sensor

  if (touchval == HIGH) {
    Serial.println(\"TOUCHED\");      // Print message when touched
  } else {
    Serial.println(\"not touched\");  // Print message when not touched
  }

  delay(500); // Wait for 0.5 seconds before reading again
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/touch detector.png',
    ],
    [
        'id' => 54,
        'title' => 'Ultrasonic Sensor',
        'description' => 'Project: Ultrasonic Distance Sensor (HC-SR04) Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Ultrasonic',
  1 => 'Sensor',
  2 => 'Serial',
  3 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'HC-SR04 Ultrasonic Sensor',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Ultrasonic Distance Sensor (HC-SR04)
  Description:
    - Measures distance using ultrasonic waves.
    - Displays the measured distance in centimeters on the Serial Monitor.
*/

const int trig = 4;  // Trigger pin connected to pin 4
const int echo = 2;  // Echo pin connected to pin 2

long duration;       // Variable to store time taken for echo
int distance;        // Variable to store calculated distance

void setup() {
  pinMode(trig, OUTPUT); // Set trigger pin as output
  pinMode(echo, INPUT);  // Set echo pin as input
  Serial.begin(9600);    // Start serial communication at 9600 baud
}

void loop() {
  // Clear the trigger pin
  digitalWrite(trig, LOW);
  delayMicroseconds(2);

  // Send a 10µs pulse to trigger the sensor
  digitalWrite(trig, HIGH);
  delayMicroseconds(10);
  digitalWrite(trig, LOW);

  // Read the echo pin and calculate duration of pulse
  duration = pulseIn(echo, HIGH);

  // Calculate distance (speed of sound = 0.034 cm/µs)
  distance = duration * 0.034 / 2;

  // Display distance on Serial Monitor
  Serial.print(\"Distance: \");
  Serial.print(distance);
  Serial.println(\" cm\");

  delay(500); // Short delay between readings
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/ultrasonic sensor.png',
    ],
    [
        'id' => 55,
        'title' => 'Water Flow Sensor',
        'description' => 'Project: Water Flow Sensor Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Water',
  1 => 'Flow',
  2 => 'Sensor',
  3 => 'Serial',
  4 => 'Digital',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'Water Level Sensor',
  2 => 'Jumper Wires',
),
        'code' => '/*
  Project: Water Flow Sensor
  Description:
    - Measures water flow rate using a Hall effect flow sensor.
    - Uses interrupts to count pulses from the sensor and calculates flow in liters per minute.
*/

int flowPin = 3;        // Sensor connected to digital pin 3
double flowRate;        // Calculated flow rate
volatile int count;     // Pulse count, must be volatile for interrupt accuracy

void setup() {
  pinMode(flowPin, INPUT);                     // Set pin as input
  attachInterrupt(digitalPinToInterrupt(3), Flow, RISING); // Attach interrupt on rising signal
  Serial.begin(9600);                          // Initialize Serial Monitor
  Serial.println(\"Water Flow Sensor Initialized...\");
}

void loop() {
  count = 0;              // Reset counter
  interrupts();           // Enable interrupts
  delay(1000);            // Count pulses for 1 second
  noInterrupts();         // Disable interrupts while calculating

  // Calculate flow rate
  flowRate = (count * 2.25);     // Each pulse = 2.25 mL/sec
  flowRate = flowRate * 60;      // Convert to mL/min
  flowRate = flowRate / 1000.0;  // Convert to L/min

  // Print flow rate
  Serial.print(\"Flow Rate: \");
  Serial.print(flowRate);
  Serial.println(\" L/min\");

  delay(500); // Wait half a second before next measurement
}

// Interrupt Service Routine (ISR) - increments count when pulse detected
void Flow() {
  count++;
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/Water_Flow_Sensor.png',
    ],
    [
        'id' => 56,
        'title' => 'Water Level Sensor',
        'description' => 'Project: Water Level Sensor Description:',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Water',
  1 => 'Level',
  2 => 'Sensor',
  3 => 'Led',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'LED',
  2 => '220Ω Resistor',
  3 => 'Breadboard',
  4 => 'Jumper Wires',
),
        'code' => '/*
  Project: Water Level Sensor
  Description:
    - Monitors water level using an analog water sensor connected to A5.
    - Indicates the water level using three LEDs (red, yellow, green).
*/

// Calibration thresholds (adjust based on your sensor and setup)
int lowerThreshold = 600;
int upperThreshold = 650;

// Sensor pin
#define waterlevel A5

// LED pins
int redLED = 3;
int yellowLED = 4;
int greenLED = 5;

void setup() {
  Serial.begin(9600);        // Initialize Serial Monitor
  pinMode(waterlevel, INPUT);

  // Set LED pins as output
  pinMode(redLED, OUTPUT);
  pinMode(yellowLED, OUTPUT);
  pinMode(greenLED, OUTPUT);

  // Turn off all LEDs initially
  digitalWrite(redLED, LOW);
  digitalWrite(yellowLED, LOW);
  digitalWrite(greenLED, LOW);
}

void loop() {
  int level = analogRead(waterlevel);  // Read water level sensor value
  Serial.print(\"Sensor Reading: \");
  Serial.println(level);

  if (level > 0 && level < 500) {
    Serial.println(\"Water Level: Empty\");
    digitalWrite(redLED, LOW);
    digitalWrite(yellowLED, LOW);
    digitalWrite(greenLED, LOW);
  }
  else if (level > 500 && level <= lowerThreshold) {
    Serial.println(\"Water Level: Low\");
    digitalWrite(redLED, HIGH);
    digitalWrite(yellowLED, LOW);
    digitalWrite(greenLED, LOW);
  }
  else if (level > lowerThreshold && level <= upperThreshold) {
    Serial.println(\"Water Level: Medium\");
    digitalWrite(redLED, LOW);
    digitalWrite(yellowLED, HIGH);
    digitalWrite(greenLED, LOW);
  }
  else if (level > upperThreshold) {
    Serial.println(\"Water Level: High\");
    digitalWrite(redLED, LOW);
    digitalWrite(yellowLED, LOW);
    digitalWrite(greenLED, HIGH);
  }

  delay(1000); // Delay 1 second before next reading
}
',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/water level.png',
    ],
    [
        'id' => 57,
        'title' => 'Ultrasonic LED Distance Indicator',
        'description' => '#define trigPin 11 #define echoPin 12',
        'category' => 'sensors',
        'difficulty' => 'beginner',
        'tags' => array (
  0 => 'Ultrasonic',
  1 => 'Led',
  2 => 'Distance',
  3 => 'Indicator',
  4 => 'Serial',
),
        'components' => array (
  0 => 'Arduino Uno',
  1 => 'HC-SR04 Ultrasonic Sensor',
  2 => 'Jumper Wires',
),
        'code' => '#define trigPin 11
#define echoPin 12
#define RedLed 13
#define greenLed 3

void setup() {
  Serial.begin (9600);
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  pinMode(RedLed, OUTPUT);
  pinMode(greenLed, OUTPUT);
}

void loop() {
  long duration, distance;
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  duration = pulseIn(echoPin, HIGH);
  distance = (duration/2) / 29.1;

  if (distance < 4) {  // This is where the RED LED On/Off happens
      digitalWrite(RedLed,HIGH); // When the Red condition is met, the Green LED should turn off
      digitalWrite(greenLed,LOW);
  }
  else {
         digitalWrite(RedLed,LOW);
         digitalWrite(greenLed,HIGH);
  }


  if (distance >= 200 || distance <= 0){
      Serial.println(\"Out of range\");
  }
  else {
        Serial.print(distance);
        Serial.println(\" cm\");
  }
  delay(500);
}',
        'author' => 'Zero2Maker',
        'date' => '2025-10-15',
        'image' => 'assets/images/ultrasonic sensor.png',
    ],
];
?>
