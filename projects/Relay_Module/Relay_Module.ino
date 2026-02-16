/*
  Project: Relay Module with PIR Sensor
  Description:
    - Controls a relay based on motion detected by a PIR sensor.
    - When motion is detected, relay turns ON; otherwise, it turns OFF.
*/

#define relay 12  // Relay signal pin connected to pin 12
#define pir 11    // PIR sensor connected to pin 11

void setup() {
  pinMode(relay, OUTPUT);  // Set relay pin as output
  pinMode(pir, INPUT);     // Set PIR sensor pin as input

  digitalWrite(relay, LOW); // Initialize relay in OFF (Normally Open) state
  Serial.begin(9600);
  Serial.println("Relay Module Initialized. Waiting for motion...");
}

void loop() {
  int pir_value = digitalRead(pir); // Read PIR sensor value

  if (pir_value == HIGH) {          // Motion detected
    digitalWrite(relay, HIGH);      // Turn ON relay
    Serial.println("Motion detected - Relay ON");
  } 
  else {                            // No motion detected
    digitalWrite(relay, LOW);       // Turn OFF relay
    Serial.println("No motion - Relay OFF");
  }

  delay(200); // Small delay for stability
}
