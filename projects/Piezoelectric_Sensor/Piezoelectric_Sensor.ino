/*
  Project: Piezoelectric Sensor
  Description:
    - Detects vibration or knock using a piezoelectric sensor.
    - Turns on onboard LED when vibration exceeds a threshold value.
*/

int piezo_out = A0;   // Piezo sensor connected to analog pin A0
int led_out = 13;     // LED connected to pin 13
int threshold = 100;  // Threshold for vibration detection

void setup() {
  pinMode(led_out, OUTPUT);  // Set LED as output
  Serial.begin(9600);        // Initialize Serial Monitor
}

void loop() {
  int value = analogRead(piezo_out);  // Read analog value from piezo sensor
  Serial.println(value);              // Print sensor value to Serial Monitor

  if (value >= threshold) {           // If vibration exceeds threshold
    digitalWrite(led_out, HIGH);      // Turn ON LED
  } else {
    digitalWrite(led_out, LOW);       // Turn OFF LED
  }

  delay(100); // Short delay for stability
}
