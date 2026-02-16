/*
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
