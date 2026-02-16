/*
  Project: Servo Motor Control
  Description:
    - Controls a servo motor connected to pin 9.
    - Moves the servo from 0° to 180° and back continuously.
*/

#include <Servo.h>

// Create a Servo object
Servo myservo;

// Create a variable for angle
int ang;

void setup() {
  // Attach servo signal pin to digital pin 9
  myservo.attach(9);
}

void loop() {
  // Move servo from 0° to 180°
  for (ang = 0; ang <= 180; ang += 1) {
    myservo.write(ang);  // Set servo angle
    delay(15);           // Wait 15 ms for servo to reach position
  }

  // Move servo from 180° back to 0°
  for (ang = 180; ang >= 0; ang -= 1) {
    myservo.write(ang);
    delay(15);
  }
}
