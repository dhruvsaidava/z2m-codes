/*
  Project: Motor Driver (L293D / L298N Basic Control)
  Description:
    - Controls two DC motors via motor driver.
    - Moves motors forward for 1 second and backward for 1 second repeatedly.
*/

// Define Motor Driver pins
const int A_1A = 4; // Left Motor Forward
const int A_1B = 5; // Left Motor Backward
const int B_1A = 6; // Right Motor Forward
const int B_1B = 7; // Right Motor Backward

void setup() {
  // Set all motor control pins as output
  pinMode(A_1A, OUTPUT);
  pinMode(A_1B, OUTPUT);
  pinMode(B_1A, OUTPUT);
  pinMode(B_1B, OUTPUT);
}

void loop() {
  // Move Forward
  digitalWrite(A_1A, HIGH);
  digitalWrite(A_1B, LOW);
  digitalWrite(B_1A, HIGH);
  digitalWrite(B_1B, LOW);
  delay(1000);

  // Move Backward
  digitalWrite(A_1A, LOW);
  digitalWrite(A_1B, HIGH);
  digitalWrite(B_1A, LOW);
  digitalWrite(B_1B, HIGH);
  delay(1000);
}
