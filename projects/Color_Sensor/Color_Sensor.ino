/*
  Project: Color Sensor (TCS3200 / TCS230)
  Description:
    - Detects color frequencies using TCS3200 color sensor.
    - Reads and prints frequency values for Red, Green, and Blue components.
*/

#define S0 5      // S0 pin connected to Arduino pin 5
#define S1 6      // S1 pin connected to Arduino pin 6
#define S2 7      // S2 pin connected to Arduino pin 7
#define S3 8      // S3 pin connected to Arduino pin 8
#define sensor 9  // Output from sensor connected to Arduino pin 9

int frequency = 0;  // Variable to store frequency readings

void setup() {
  pinMode(S0, OUTPUT);
  pinMode(S1, OUTPUT);
  pinMode(S2, OUTPUT);
  pinMode(S3, OUTPUT);
  pinMode(sensor, INPUT);

  // Set frequency scaling to 20%
  digitalWrite(S0, HIGH);
  digitalWrite(S1, LOW);

  Serial.begin(9600);
  Serial.println("TCS3200 Color Sensor Test Initialized");
}

void loop() {
  // Read RED component
  digitalWrite(S2, LOW);
  digitalWrite(S3, LOW);
  frequency = pulseIn(sensor, LOW);
  Serial.print("R = ");
  Serial.print(frequency);
  Serial.print(" ");

  delay(100);

  // Read GREEN component
  digitalWrite(S2, HIGH);
  digitalWrite(S3, HIGH);
  frequency = pulseIn(sensor, LOW);
  Serial.print("G = ");
  Serial.print(frequency);
  Serial.print(" ");

  delay(100);

  // Read BLUE component
  digitalWrite(S2, LOW);
  digitalWrite(S3, HIGH);
  frequency = pulseIn(sensor, LOW);
  Serial.print("B = ");
  Serial.print(frequency);
  Serial.println(" ");

  delay(200);
}
