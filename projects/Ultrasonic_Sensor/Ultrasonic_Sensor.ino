/*
  Project: Ultrasonic Distance Sensor (HC-SR04)
  Description:
    - Measures distance using ultrasonic waves.
    - Displays the measured distance in centimeters on the Serial Monitor.
*/

const int trig = 4;  // Trigger pin connected to pin 4
const int echo = 2;  // Echo pin connected to pin 2

long duration;       // Variable to store time taken for echo
int distance;        // Variable to store calculated distance

void setup() {
  pinMode(trig, OUTPUT); // Set trigger pin as output
  pinMode(echo, INPUT);  // Set echo pin as input
  Serial.begin(9600);    // Start serial communication at 9600 baud
}

void loop() {
  // Clear the trigger pin
  digitalWrite(trig, LOW);
  delayMicroseconds(2);

  // Send a 10µs pulse to trigger the sensor
  digitalWrite(trig, HIGH);
  delayMicroseconds(10);
  digitalWrite(trig, LOW);

  // Read the echo pin and calculate duration of pulse
  duration = pulseIn(echo, HIGH);

  // Calculate distance (speed of sound = 0.034 cm/µs)
  distance = duration * 0.034 / 2;

  // Display distance on Serial Monitor
  Serial.print("Distance: ");
  Serial.print(distance);
  Serial.println(" cm");

  delay(500); // Short delay between readings
}
