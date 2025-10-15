/*
  Project: Touch Detector
  Description:
    - Detects touch input using a digital touch sensor connected to pin 3.
    - Displays "TOUCHED" or "not touched" on the Serial Monitor.
*/

int touch = 3; // Touch sensor connected to digital pin 3

void setup() {
  Serial.begin(9600);     // Initialize Serial Monitor
  pinMode(touch, INPUT);  // Set touch pin as input
}

void loop() {
  int touchval = digitalRead(touch); // Read value from touch sensor

  if (touchval == HIGH) {
    Serial.println("TOUCHED");      // Print message when touched
  } else {
    Serial.println("not touched");  // Print message when not touched
  }

  delay(500); // Wait for 0.5 seconds before reading again
}
