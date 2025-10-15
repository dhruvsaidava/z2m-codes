/*
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
  Serial.println("Gas Sensor Module Initialized...");
}

void loop() {
  int value = analogRead(smoke); // Read analog sensor value
  Serial.print("Sensor Reading: ");
  Serial.println(value);         // Display reading on Serial Monitor

  if (value > threshold) {
    digitalWrite(led, HIGH);     // Turn ON LED if gas concentration exceeds threshold
    Serial.println("Status: Smoke Detected!");
  } else {
    digitalWrite(led, LOW);      // Turn OFF LED if safe
    Serial.println("Status: Air Clear.");
  }

  delay(1000); // Wait for 1 second before next reading
}
