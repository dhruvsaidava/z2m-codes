/*
  Project: Bluetooth Module Control
  Description:
    - Receives commands via Bluetooth (e.g., from Z2M Bluetooth RC App).
    - Controls onboard LED on pin 13 based on received characters.
    - Commands:
        'F' - Turn LED ON
        'B' - Turn LED OFF
    - Extendable for controlling servos, motors, etc.
*/

char data = 0; // Variable to store received data

void setup() {
  Serial.begin(9600);     // Initialize serial communication
  pinMode(13, OUTPUT);    // Set LED pin as output
}

void loop() {
  // Check if data is received via Bluetooth
  if (Serial.available() > 0) {
    data = Serial.read();   // Read incoming data
    Serial.println(data);   // Print received data to Serial Monitor

    // Control LED based on received command
    if (data == 'F') {
      digitalWrite(13, HIGH);  // Turn LED ON
    } 
    else if (data == 'B') {
      digitalWrite(13, LOW);   // Turn LED OFF
    }
  }
}
