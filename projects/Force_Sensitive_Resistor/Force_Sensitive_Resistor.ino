/*
  Project: Force Sensitive Resistor (FSR)
  Description:
    - Measures applied pressure using a force-sensitive resistor connected to A0.
    - Displays pressure level on the Serial Monitor (no, light, medium, or high pressure).
*/

int pressureAnalogPin = A0;  // Analog pin connected to FSR
int pressureReading;         // Variable to store analog reading

// Thresholds for different pressure levels (adjust as needed)
int noPressure = 0;
int lightPressure = 200;
int mediumPressure = 700;

void setup(void) {
  Serial.begin(9600);  // Initialize Serial Monitor
  Serial.println("FSR Pressure Sensor Initialized...");
}

void loop(void) {
  // Read analog data from FSR sensor
  pressureReading = analogRead(pressureAnalogPin);

  // Print raw sensor value
  Serial.print("Pressure Pad Reading = ");
  Serial.println(pressureReading);

  // Determine and display pressure level
  if (pressureReading <= noPressure) {
    Serial.println(" - No Pressure");
  } else if (pressureReading < lightPressure) {
    Serial.println(" - Light Pressure");
  } else if (pressureReading < mediumPressure) {
    Serial.println(" - Medium Pressure");
  } else {
    Serial.println(" - High Pressure");
  }

  delay(1000); // Wait 1 second between readings
}
