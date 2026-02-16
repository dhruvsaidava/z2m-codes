/*
  Project: Membrane Keypad (4x4)
  Description:
    - Reads input from a 4x4 membrane keypad.
    - Displays pressed keys on the Serial Monitor.
    - Works with EMS-0016-B and EMS-0016-C keypads.
*/

#include <Keypad.h>

// Define number of rows and columns
const byte ROWS = 4;
const byte COLS = 4;

// Define keypad layout
char keys[ROWS][COLS] = {
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};

// Connect keypad row and column pins to Arduino
byte rPins[ROWS] = {10, 9, 8, 7}; // Row pins
byte cPins[COLS] = {6, 5, 4, 3};  // Column pins

// Create Keypad object
Keypad keypad = Keypad(makeKeymap(keys), rPins, cPins, ROWS, COLS);

void setup() {
  Serial.begin(9600); // Initialize Serial Monitor
  Serial.println("Membrane Keypad Initialized. Press a key...");
}

void loop() {
  char key = keypad.getKey(); // Read key press

  // If a key is pressed, display it on the Serial Monitor
  if (key) {
    Serial.print("Key Pressed: ");
    Serial.println(key);
  }
}
