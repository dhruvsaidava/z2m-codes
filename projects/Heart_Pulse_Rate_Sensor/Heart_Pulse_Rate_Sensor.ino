/*
  Project: Heart Pulse Rate Sensor
  Reference: https://pulsesensor.com/pages/code-and-guide
  Description:
    - Reads pulse signal from Pulse Sensor connected to Analog Pin A0.
    - Lights up onboard LED (Pin 13) when a beat is detected.
*/

int PulseSensorPurplePin = 0;  // Pulse Sensor purple wire connected to A0
int LED13 = 13;                // Onboard LED pin

// Variables for pulse detection
int Signal;                    // Holds the analog signal value
int Threshold = 510;           // Threshold value to detect heartbeat

void setup() {
  pinMode(LED13, OUTPUT);      // LED pin as output
  Serial.begin(9600);          // Begin serial communication
}

void loop() {
  // Read pulse sensor value
  Signal = analogRead(PulseSensorPurplePin);

  // Print the analog value to Serial Monitor
  Serial.println(Signal);

  // Compare signal to threshold to detect heartbeat
  if (Signal > Threshold) {
    digitalWrite(LED13, HIGH); // Turn ON LED when beat detected
  } else {
    digitalWrite(LED13, LOW);  // Turn OFF LED when no beat
  }

  delay(10); // Small delay for stable readings
}
