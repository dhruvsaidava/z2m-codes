/*
  Project: Analog Temperature Sensor (e.g., LM35)
  Description:
    - Reads analog temperature data from sensor connected to A0.
    - Converts the reading to degrees Celsius and prints it to Serial Monitor.
*/

int tempsensor = A0;  // Connect sensor output to A0

void setup() {
  pinMode(tempsensor, INPUT); // Set temperature sensor pin as input
  Serial.begin(9600);         // Start serial communication
}

void loop() {
  float val = analogRead(tempsensor);  // Read sensor value (0–1023)
  float celc = (val * 500.0) / 1024.0; // Convert analog value to °C

  Serial.println("");
  Serial.print("deg Celsius = ");
  Serial.println(celc);
  Serial.println("");

  delay(1000); // Wait for 1 second before next reading
}
