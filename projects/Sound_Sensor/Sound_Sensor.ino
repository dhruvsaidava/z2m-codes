/*
  Project: Sound Sensor with LED Brightness Control
  Description:
    - Reads analog input from a sound sensor connected to A0.
    - Adjusts LED brightness on pin 11 based on sound intensity.
*/

const int led = 11;   // LED connected to pin 11
const int sound = A0; // Sound sensor connected to A0

int soundVal = 0;     // Variable to store sound sensor reading
int bright;           // Variable to store calculated brightness

void setup() {
  pinMode(led, OUTPUT);   // Set LED pin as output
  pinMode(sound, INPUT);  // Set sound sensor pin as input
  Serial.begin(9600);     // Initialize Serial Monitor
}

void loop() {
  // Read analog value from sound sensor
  soundVal = analogRead(sound);

  // Print sound value to Serial Monitor
  Serial.print("soundVal = ");
  Serial.println(soundVal);

  // Map sound value range (adjust 516 as baseline background noise)
  bright = map(soundVal, 516, 1023, 0, 255);
  bright = max(0, bright); // Prevent negative values

  // Adjust LED brightness based on sound level
  analogWrite(led, bright);

  // Delay for 0.2 seconds
  delay(200);
}
