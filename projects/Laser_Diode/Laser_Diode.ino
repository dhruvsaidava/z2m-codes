/*
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
