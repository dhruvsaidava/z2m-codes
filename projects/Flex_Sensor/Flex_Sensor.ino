/*
  Project: Flex Sensor
  Description:
    - Reads bending from a flex sensor connected to analog pin A0.
    - Maps analog values to angle (0–180°) and controls an LED when bent beyond 90°.
*/

#define led_Pin 7   // LED connected to pin 7
#define sensor A0   // Flex sensor connected to A0

int analog_value;   // Variable to store analog reading
int angle_value;    // Variable to store calculated angle

void setup() {
  pinMode(led_Pin, OUTPUT);  // Set LED pin as output
  Serial.begin(9600);        // Initialize Serial Monitor
}

void loop() {
  // Read analog value from flex sensor
  analog_value = analogRead(sensor);

  // Map analog value range (700–900) to angle range (0–180)
  angle_value = map(analog_value, 700, 900, 0, 180);

  // Print readings to Serial Monitor
  Serial.print("Analog: ");
  Serial.println(analog_value);
  Serial.print("Angle: ");
  Serial.println(angle_value);

  // Turn on LED if flex angle > 90°, else turn off
  if (angle_value > 90) {
    digitalWrite(led_Pin, HIGH);
  } else {
    digitalWrite(led_Pin, LOW);
  }

  delay(1000); // Wait 1 second before next reading
}
