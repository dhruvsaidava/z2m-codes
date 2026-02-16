/*
  Project: Rain Sensor
  Description:
    - Reads digital and analog values from a rain sensor.
    - Displays the moisture status (wet/dry) and analog readings on the Serial Monitor.
*/

const int Digvalue = 2;  // Digital output pin from rain sensor
const int Analogval = A1; // Analog output pin from rain sensor

int val_analog; // Variable to store analog reading

void setup() {
  pinMode(Digvalue, INPUT);
  pinMode(Analogval, INPUT);
  Serial.begin(9600); // Initialize Serial Monitor at 9600 baud
}

void loop() {
  // Check digital rain detection status
  if (digitalRead(Digvalue) == LOW) {
    Serial.println("Digital value : wet");  // When sensor detects water
    delay(12);
  } else {
    Serial.println("Digital value : dry");  // When sensor detects no water
    delay(12);
  }

  // Read analog value from rain sensor
  val_analog = analogRead(Analogval);
  Serial.print("Analog value : ");
  Serial.println(val_analog);  // Display analog moisture value
  Serial.println("");

  delay(1000); // Wait for 1 second before next reading
}
