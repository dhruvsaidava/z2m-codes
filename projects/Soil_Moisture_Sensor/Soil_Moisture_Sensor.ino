/*
  Project: Soil Moisture Sensor
  Description:
    - Reads soil moisture level using an analog sensor.
    - Turns on red LED when soil is dry (low moisture).
    - Turns on green LED when soil is moist (adequate water level).
*/

#define red 6     // Connect red LED to pin 6
#define green 7   // Connect green LED to pin 7
int sensor = A0;  // Connect soil sensor analog output to A0

int threshold = 400; // Threshold for moisture detection

void setup() {
  pinMode(red, OUTPUT);
  pinMode(green, OUTPUT);
  pinMode(sensor, INPUT);
  Serial.begin(9600);
}

void loop() {
  int value = analogRead(sensor);  // Read soil moisture sensor value
  Serial.println(value);           // Print sensor value to Serial Monitor

  if (value > threshold) {
    digitalWrite(red, HIGH);       // Soil dry -> red LED ON
    digitalWrite(green, LOW);      // Turn green LED OFF
  } else {
    digitalWrite(green, HIGH);     // Soil moist -> green LED ON
    digitalWrite(red, LOW);        // Turn red LED OFF
  }

  delay(1000); // Wait 1 second before next reading
}
