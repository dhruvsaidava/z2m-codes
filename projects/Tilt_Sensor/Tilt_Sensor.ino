/*
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
