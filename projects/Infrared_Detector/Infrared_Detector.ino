/*
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
