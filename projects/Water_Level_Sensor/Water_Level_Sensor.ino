/*
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
  Serial.print("Sensor Reading: ");
  Serial.println(level);

  if (level > 0 && level < 500) {
    Serial.println("Water Level: Empty");
    digitalWrite(redLED, LOW);
    digitalWrite(yellowLED, LOW);
    digitalWrite(greenLED, LOW);
  } 
  else if (level > 500 && level <= lowerThreshold) {
    Serial.println("Water Level: Low");
    digitalWrite(redLED, HIGH);
    digitalWrite(yellowLED, LOW);
    digitalWrite(greenLED, LOW);
  } 
  else if (level > lowerThreshold && level <= upperThreshold) {
    Serial.println("Water Level: Medium");
    digitalWrite(redLED, LOW);
    digitalWrite(yellowLED, HIGH);
    digitalWrite(greenLED, LOW);
  } 
  else if (level > upperThreshold) {
    Serial.println("Water Level: High");
    digitalWrite(redLED, LOW);
    digitalWrite(yellowLED, LOW);
    digitalWrite(greenLED, HIGH);
  }

  delay(1000); // Delay 1 second before next reading
}
