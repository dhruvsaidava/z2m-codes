/*
  Project: Metal Touch Sensor
  Description:
    - Reads analog and digital values from a metal touch sensor
    - Displays voltage and touch detection status on Serial Monitor
*/

int AInput = A0; // Analog input from sensor
int DInput = 3;  // Digital input from sensor

void setup() {
  pinMode(AInput, INPUT); // Set pin for analog input
  pinMode(DInput, INPUT); // Set pin for digital input
  Serial.begin(9600);     // Begin Serial communication at 9600 baud
}

void loop() {
  float analogValue;  // Variable for analog reading (voltage)
  int digitalValue;   // Variable for digital reading (touch status)

  // Read analog value and convert it to voltage (0–5V)
  analogValue = analogRead(AInput) * (5.0 / 1023.0);

  // Read digital value from sensor (0 or 1)
  digitalValue = digitalRead(DInput);

  // Display results on Serial Monitor
  Serial.print("Analog voltage value: ");
  Serial.print(analogValue);
  Serial.print("V, ");

  Serial.print("Touch input: ");
  if (digitalValue == 1) {
    Serial.println("detected");
  } else {
    Serial.println("not detected");
  }

  Serial.println("---------------------");
  delay(250);
}
