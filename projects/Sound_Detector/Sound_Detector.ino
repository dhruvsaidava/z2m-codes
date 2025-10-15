/*
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
