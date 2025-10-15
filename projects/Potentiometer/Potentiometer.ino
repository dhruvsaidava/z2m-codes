/*
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
  Serial.print("Potentiometer Value: ");
  Serial.println(val);

  digitalWrite(ledPin, HIGH); // Turn LED ON
  delay(val);                 // Wait for time based on potentiometer value
  digitalWrite(ledPin, LOW);  // Turn LED OFF
  delay(val);                 // Wait again for same duration
}
