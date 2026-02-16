/*
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
