/*
  Project: Light Dependent Resistor (LDR)
  Description:
    - Reads the light intensity using an LDR connected to analog pin A0.
    - Displays the sensor value on the Serial Monitor.
*/

int LDR = A0;   // LDR connected to analog pin A0
int LDRVal;     // Variable to store LDR reading

void setup() {
  pinMode(LDR, INPUT);   // Set LDR pin as input
  Serial.begin(9600);    // Initialize Serial Monitor
}

void loop() {
  LDRVal = analogRead(LDR);   // Read value from LDR
  Serial.print("LDR Value: ");
  Serial.println(LDRVal);     // Print the value to Serial Monitor
  delay(100);                 // Wait a little before the next reading
}
